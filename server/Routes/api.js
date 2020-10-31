'use strict';

let express = require('express'),
    router = express.Router();

// Require Controllers
let UserApiController = require('../App/Controllers/Api/UserApiController');
let BankApiController = require('../App/Controllers/Api/BankApiController');
let BankMovementApiController = require('../App/Controllers/Api/BankMovementApiController');

// Instances
UserApiController = new UserApiController();
BankApiController = new BankApiController();
BankMovementApiController = new BankMovementApiController();

router.get('/users', UserApiController.all);
router.get('/users/:username', UserApiController.show)
router.post('/users', UserApiController.create);

router.get('/banks', BankApiController.all)
router.get('/banks/extract', BankMovementApiController.all);

module.exports = router;
