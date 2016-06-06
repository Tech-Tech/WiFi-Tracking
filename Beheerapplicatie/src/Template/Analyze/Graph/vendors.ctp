<script src="https://www.gstatic.com/charts/loader.js"></script>
<?= $this->Form->create() ?>
<fieldset>
    <legend><?= __('Select location and time period') ?></legend>
    <?= $this->Form->input('locations', ['type' => 'select', 'options' => $locations, 'label' => 'Location']) ?>
    <?= $this->Form->input('begin_date', ['type' => 'datetime-local',  'label' => 'Begin date (UTC)']) ?>
    <?= $this->Form->input('end_date', ['type' => 'datetime-local', 'label' => 'End date (UTC)']) ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

<div id="dashboard">
    <div id="chart_div"></div>
    <div id="filter_div"></div>
</div>

<script>
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'X');
        data.addColumn('number', 'Y 1');
        data.addColumn({type: 'boolean', role: 'certainty'});
        data.addColumn('number', 'Y 2');
        data.addColumn({type: 'string', role: 'annotation'});
        data.addColumn({type: 'boolean', role: 'certainty'});
        data.addColumn('number', 'Y 3');
        data.addColumn({type: 'boolean', role: 'certainty'});

        // add random data
        var y1 = 50, y2 = 50, y3 = 50;
        for (var i = 0; i < 30; i++) {
            y1 += ~~(Math.random() * 5) * Math.pow(-1, ~~(Math.random() * 2));
            y2 += ~~(Math.random() * 5) * Math.pow(-1, ~~(Math.random() * 2));
            y3 += ~~(Math.random() * 5) * Math.pow(-1, ~~(Math.random() * 2));
            data.addRow([i, y1, (~~(Math.random() * 2) == 1), y2, y2.toString(), (~~(Math.random() * 2) == 1), y3, (~~(Math.random() * 2) == 1)]);
        }

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ChartWrapper({
            chartType: 'LineChart',
            containerId: 'chart_div',
            dataTable: data,
            options: {
                width: 600,
                height: 400
            }
        });

        // create columns array
        var columns = [0];
        /* the series map is an array of data series
         * "column" is the index of the data column to use for the series
         * "roleColumns" is an array of column indices corresponding to columns with roles that are associated with this data series
         * "display" is a boolean, set to true to make the series visible on the initial draw
         */
        var seriesMap = [{
            column: 1,
            roleColumns: [2],
            display: true
        }, {
            column: 3,
            roleColumns: [4, 5],
            display: true
        }, {
            column: 6,
            roleColumns: [7],
            display: false
        }];
        var columnsMap = {};
        var series = [];
        for (var i = 0; i < seriesMap.length; i++) {
            var col = seriesMap[i].column;
            columnsMap[col] = i;
            // set the default series option
            series[i] = {};
            if (seriesMap[i].display) {
                // if the column is the domain column or in the default list, display the series
                columns.push(col);
            }
            else {
                // otherwise, hide it
                columns.push({
                    label: data.getColumnLabel(col),
                    type: data.getColumnType(col),
                    sourceColumn: col,
                    calc: function () {
                        return null;
                    }
                });
                // backup the default color (if set)
                if (typeof(series[i].color) !== 'undefined') {
                    series[i].backupColor = series[i].color;
                }
                series[i].color = '#CCCCCC';
            }
            for (var j = 0; j < seriesMap[i].roleColumns.length; j++) {
                columns.push(seriesMap[i].roleColumns[j]);
            }
        }

        chart.setOption('series', series);

        function showHideSeries () {
            var sel = chart.getChart().getSelection();
            // if selection length is 0, we deselected an element
            if (sel.length > 0) {
                // if row is undefined, we clicked on the legend
                if (sel[0].row == null) {
                    var col = sel[0].column;
                    if (typeof(columns[col]) == 'number') {
                        var src = columns[col];

                        // hide the data series
                        columns[col] = {
                            label: data.getColumnLabel(src),
                            type: data.getColumnType(src),
                            sourceColumn: src,
                            calc: function () {
                                return null;
                            }
                        };

                        // grey out the legend entry
                        series[columnsMap[src]].color = '#CCCCCC';
                    }
                    else {
                        var src = columns[col].sourceColumn;

                        // show the data series
                        columns[col] = src;
                        series[columnsMap[src]].color = null;
                    }
                    var view = chart.getView() || {};
                    view.columns = columns;
                    chart.setView(view);
                    chart.draw();
                }
            }
        }

        google.visualization.events.addListener(chart, 'select', showHideSeries);

        // create a view with the default columns
        var view = {
            columns: columns
        };
        chart.draw();
    }

    google.charts.load('visualization', '1', {packages: ['corechart'], callback: drawChart});
</script

