<?php

class FormHandler
{
   /**
     * @param ViewHandler $viewHandler
     * @param View        $view
     * @param Request     $request
     * @param string      $format
     *
     * @return Response
     */
    public function createResponse(ViewHandler $handler, View $view, Request $request, $format)
    {
        if ($this->isFormRequest($request)) {
            return $this->getFormResponse($request);
        }

        return $this->getJsonResponse($request);
    }

    private getFormResponse(Request $request)
    {

    }

    private getJsonResponse(Request $request)
    {

    }
    

    private function isFormRequest()
    {

    }
}
