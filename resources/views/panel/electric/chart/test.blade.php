@extends('main')
@section('body')
    <script src="assets/vendor/chartist/js/chartist.min.js"></script>
    <script src="assets/vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
    <script src="assets/js/plugins-init/chartist-init.js"></script>




    <div class="col-md-12">

        <div class="ct-chart ct-perfect-fourth"></div>
    </div>





    <script>
        new Chartist.Line('.ct-chart2', {
            labels: [
                @foreach ($la as $l)
                    '{{ $l }}',
                @endforeach
            ],
            series: [
                [
                    @foreach ($se as $s)
                        {{ $s }},
                    @endforeach
                ],
            ]
        }, {
            fullWidth: true,
            chartPadding: {
                right: 40
            }
        });
    </script>


    <script>
        new Chartist.Line('.ct-chart1', {
            labels: ['دوره اول', 'دوره دوم', 'دوره سوم ', 'دوره چهارم', 'دوره پنجم', 'دوره ششم', 'دوره هفتم',
                'دوره هشتم', 'دوره نهم'
            ],
            series: [
                [12, 9, 7, 8, 5],
                [2, 1, 3.5, 7, 3],
                [1, 3, 4, 5, 6]
            ]
        }, {
            fullWidth: true,
            chartPadding: {
                right: 40
            },
            plugins: [
                Chartist.plugins.tooltip()
            ]
        });
    </script>


    <script>
        new Chartist.Line('.ct-chart1', {
            labels: [
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
            ],
            series: [
                [
                    12,
                    9,
                    7,
                    8,
                    5,
                ],
            ]
        }, {
            fullWidth: true,
            chartPadding: {
                right: 40
            }
        });
    </script>

    <script>
        var chart = new Chartist.Line('.ct-chart', {
            labels: [
                @foreach ($la as $l)
                    '{{ $l }}',
                @endforeach
            ],
            series: [
                [
                    @foreach ($se as $s)
                        {{ $s }},
                    @endforeach
                ],
            ]

        }, {
            low: 0
        });

        // Let's put a sequence number aside so we can use it in the event callbacks
        var seq = 0,
            delays = 180,
            durations = 5000;

        // Once the chart is fully created we reset the sequence
        chart.on('created', function() {
            seq = 0;
        });

        // On each drawn element by Chartist we use the Chartist.Svg API to trigger SMIL animations
        chart.on('draw', function(data) {
            seq++;

            if (data.type === 'line') {
                // If the drawn element is a line we do a simple opacity fade in. This could also be achieved using CSS3 animations.
                data.element.animate({
                    opacity: {
                        // The delay when we like to start the animation
                        begin: seq * delays + 1000,
                        // Duration of the animation
                        dur: durations,
                        // The value where the animation should start
                        from: 0,
                        // The value where it should end
                        to: 1
                    }
                });
            } else if (data.type === 'label' && data.axis === 'x') {
                data.element.animate({
                    y: {
                        begin: seq * delays,
                        dur: durations,
                        from: data.y + 100,
                        to: data.y,
                        // We can specify an easing function from Chartist.Svg.Easing
                        easing: 'easeOutQuart'
                    }
                });
            } else if (data.type === 'label' && data.axis === 'y') {
                data.element.animate({
                    x: {
                        begin: seq * delays,
                        dur: durations,
                        from: data.x - 100,
                        to: data.x,
                        easing: 'easeOutQuart'
                    }
                });
            } else if (data.type === 'point') {
                data.element.animate({
                    x1: {
                        begin: seq * delays,
                        dur: durations,
                        from: data.x - 10,
                        to: data.x,
                        easing: 'easeOutQuart'
                    },
                    x2: {
                        begin: seq * delays,
                        dur: durations,
                        from: data.x - 10,
                        to: data.x,
                        easing: 'easeOutQuart'
                    },
                    opacity: {
                        begin: seq * delays,
                        dur: durations,
                        from: 0,
                        to: 1,
                        easing: 'easeOutQuart'
                    }
                });
            } else if (data.type === 'grid') {
                // Using data.axis we get x or y which we can use to construct our animation definition objects
                var pos1Animation = {
                    begin: seq * delays,
                    dur: durations,
                    from: data[data.axis.units.pos + '1'] - 30,
                    to: data[data.axis.units.pos + '1'],
                    easing: 'easeOutQuart'
                };

                var pos2Animation = {
                    begin: seq * delays,
                    dur: durations,
                    from: data[data.axis.units.pos + '2'] - 100,
                    to: data[data.axis.units.pos + '2'],
                    easing: 'easeOutQuart'
                };

                var animations = {};
                animations[data.axis.units.pos + '1'] = pos1Animation;
                animations[data.axis.units.pos + '2'] = pos2Animation;
                animations['opacity'] = {
                    begin: seq * delays,
                    dur: durations,
                    from: 0,
                    to: 1,
                    easing: 'easeOutQuart'
                };

                data.element.animate(animations);
            }
        });

        // For the sake of the example we update the chart every time it's created with a delay of 10 seconds
        chart.on('created', function() {
            if (window.__exampleAnimateTimeout) {
                clearTimeout(window.__exampleAnimateTimeout);
                window.__exampleAnimateTimeout = null;
            }
            window.__exampleAnimateTimeout = setTimeout(chart.update.bind(chart), 12000);
        });
    </script>
@endsection
