'use strict';

// Models
const Mail = require('../../Models/Mail');

class MailApiController
{
    all (request, response, next) {
        Mail.find({}, (err, mails) => {
            response.json(mails);
        }).get();

    }
}

module.exports = MailApiController;
