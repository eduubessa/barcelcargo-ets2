var express = require('express'),
    bodyParser = require('body-parser')
    database = require('./database/mongoose'),
    port = process.env.PORT || 3000;
    app = express();

app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// API Router
const routerWeb = require('./Routes/web');
const routerApi = require('./Routes/api');

app.use('/', routerWeb)
app.use('/api', routerApi)

app.listen(port);

console.log(`TODO: List Restful API Server started on ${port}`);
