<?php

namespace MKosolofskiSite\FormBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\{
    Route,
    ParamConverter
};

use MKosolofski\Site\FormBundle\{
    Form\ContactType,
    Response\FormResponse
};

class ContactController
{

    /**
     * @Route("/create", name="contact_post")
     * @Methods({"POST"})
     * @View
     * @ParamConverter("contact", "fos_rest.request_body")
     */
    public function postContact(Contact $contact, ConstraintViolationList $validationErrors)
    {
        return new FormResponse($request->request->all(), $validationErrors);
    }
}
