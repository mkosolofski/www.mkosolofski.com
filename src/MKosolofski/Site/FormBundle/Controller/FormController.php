<?php
/**
 * Contains MKosolofski\Site\FormBundle\Controller\FormController
 *
 * @package MKosolofski
 * @subpackage Site\FormBundle\Controller
 */
namespace MKosolofski\Site\FormBundle\Controller;

use Symfony\Component\HttpFoundation\{
    Request,
    RequestStack
};

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface,
    Symfony\Component\Form\FormFactoryInterface;

/**
 * For rendering forms within templates. Typically used in route configs.
 * 
 * Exposes a required "form" property in a route config. This property:
 * - should contain the absolute namespace of a form object.
 * - be a form that extends \Symfony\Component\Form\AbstractType
 * - is availabe in a template as a variable called "form".
 *
 * Example:
 * <pre>
 *     contact_get:
 *         path: /contact
 *         methods:  [GET]
 *         defaults:
 *             _controller: mkosolofski.site.form_bundle.controller.form_controller:render
 *             template:    ::contact.html.twig
 *             form: MKosolofski\Site\FormBundle\Form\ContactType
 * </pre>
 *
 * @package MKosolofski
 * @subpackage Site\FormBundle\Controller
 * @author Matthew Kosolofski <matthew.kosolofski@gmail.com>
 */
class FormController extends TemplateController
{
    /**
     * @var FormFactoryInterface
     */
    protected $formFactory;

    /**
     * @param RequestStack         $requestStack
     * @param EngineInterface      $templating
     * @param FormFactoryInterface $formFactoryInterface
     */
    public function __construct(
        RequestStack $requestStack,
        EngineInterface $templating,
        FormFactoryInterface $formFactory
    ) {

        parent::__construct($requestStack, $templating);
        $this->formFactory = $formFactory;
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function getTemplateVars(Request $request): array
    {
        return array_merge(
            parent::getTemplateVars($request),
            ['form' => $this->formFactory->create($request->attributes->get('form'))->createView()]
        );
    }
}
