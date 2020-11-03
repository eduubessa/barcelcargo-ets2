'use strict';

const Bank = require('../../Models/Bank');
const User = require('../../Models/User');

class BankApiController {

    async all(request, response, next)
    {
        let banks = await Bank.find({}, (err, banks) => {
            if (err) response.send(err);
            response.send(banks);
        }).select('-_id -__v').populate('user', '-_id -password -__v');
    }

    async show(request, response, next)
    {
        await User.findOne({ nickname : request.params.username }, (err, user) => {
            if (err) response.send(err);
            response.send(user.bank);
        }).select('-_id -__v').populate('bank', '-_id -password -__v');
    }
}

module.exports = BankApiController;
