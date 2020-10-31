'use strict'

const Bank = require('../../Models/Bank');

class BankApiController {

    async all(request, response, next)
    {
        let banks = await Bank.find({}, (err, banks) => {
            if (err) response.send(err);

            response.send(banks);
        }).select('-_id -__v').populate('user', '-_id -password -__v');
    }
}

module.exports = BankApiController;
