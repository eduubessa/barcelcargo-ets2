'use strict';

let express = require('express'),
    router = express.Router();

// Require Controllers
let AuthApiController = require('../App/Controllers/Api/AuthApiController');
let UserApiController = require('../App/Controllers/Api/UserApiController');
let BankApiController = require('../App/Controllers/Api/BankApiController');
let MailApiController = require('../App/Controllers/Api/MailApiController');
let BankMovementApiController = require('../App/Controllers/Api/BankMovementApiController');

// Instances
AuthApiController = new AuthApiController();
UserApiController = new UserApiController();
BankApiController = new BankApiController();
MailApiController = new MailApiController();
BankMovementApiController = new BankMovementApiController();

// Auth
router.get('/auth/login');
router.get('/auth/register');

router.get('/users', UserApiController.all);
router.get('/users/:username', UserApiController.show)
router.post('/users', UserApiController.create);

router.get('/banks', BankApiController.all)
router.get('/bank/:username', BankApiController.show);
router.post('/bank/move', BankMovementApiController.create)
router.get('/bank/:username/extract', BankMovementApiController.show);

router.get('/mails', MailApiController.all);

module.exports = router;
