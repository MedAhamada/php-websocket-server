<!DOCTYPE html>
<html>
<head>
    <title>WS Client</title>
</head>
<body>

<script type="text/javascript" src="js/autobahn.js"></script>
<script>
    var conn = new ab.Session('ws://127.0.0.1:8888',
        function() {
            conn.subscribe('event-123456', function(topic, data) {
                // This is where you would add the new article to the DOM (beyond the scope of this tutorial)
                console.log('New article published to category "' + topic + '" : ' + data);
            });
        },
        function() {
            console.warn('WebSocket connection closed');
        },
        {'skipSubprotocolCheck': true}
    );
</script>
</body>
</html>
