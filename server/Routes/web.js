'use strict';

let express = require('express'),
    router = express.Router();

// Require Controllers
let UserViewController = require('../App/Controllers/Views/UserViewController');

// Instances
UserViewController = new UserViewController();

router.get('/users', UserViewController.all)

module.exports = router;

