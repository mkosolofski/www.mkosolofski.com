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

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

/**
 * For rendering templates. Typically used in route configs.
 * 
 * Exposes new optional "template_vars" property in a route config. This property should
 * contain key value pairs that will be passed into the template being rendered.
 * 
 * Example:
 * <pre>
 *     home:
 *         path: /
 *         defaults:
 *             _controller: mkosolofski.site.form_bundle.controller.template_controller:render
 *             template:    home.html.twig
 *             template_vars:
 *                 variableOne: value
 * </pre>
 *
 * @package MKosolofski
 * @subpackage Site\FormBundle\Controller
 * @author Matthew Kosolofski <matthew.kosolofski@gmail.com>
 */
class TemplateController
{
    /**
     * @var RequestStack
     */
    protected $requestStack;

    /**
     * @var EngineInterface
     */
    protected $templating;

    /**
     * @param RequestStack         $requestStack
     * @param EngineInterface      $templating
     */
    public function __construct(
        RequestStack $requestStack,
        EngineInterface $templating
    ) {
        $this->requestStack = $requestStack;
        $this->templating   = $templating;
    }

    /**
     * Renders a template in the current route request.
     */
    public function render()
    {
        $request = $this->requestStack->getCurrentRequest();

        return $this->templating->renderResponse(  
            $request->attributes->get('template'),
            $this->getTemplateVars($request)
        );
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function getTemplateVars(Request $request): array
    {
        $vars = $request->attributes->get('template_vars');
        return is_array($vars) ? $vars : [];
    }
}
