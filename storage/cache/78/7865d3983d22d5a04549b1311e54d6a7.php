<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* admin/dashboard.twig */
class __TwigTemplate_902e3587c1813f75336b8bc6f4e15ba3 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<div class=\"content-body\">
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"col-lg-3 col-sm-6\">
                <div class=\"card\">
                    <div class=\"stat-widget-two card-body\">
                        <div class=\"stat-content\">
                            <div class=\"stat-text\">إجمالي الأرباح الشهرية</div>
                            <div class=\"stat-digit\"> <i class=\"fa fa-usd\"></i>";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["monthlyProfit"] ?? null), "html", null, true);
        yield "</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"col-lg-3 col-sm-6\">
                <div class=\"card\">
                    <div class=\"stat-widget-two card-body\">
                        <div class=\"stat-content\">
                            <div class=\"stat-text\">عدد الفواتير</div>
                            <div class=\"stat-digit\"> <i class=\"fa fa-file\"></i>";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["invoiceCount"] ?? null), "html", null, true);
        yield "</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"col-lg-3 col-sm-6\">
                <div class=\"card\">
                    <div class=\"stat-widget-two card-body\">
                        <div class=\"stat-content\">
                            <div class=\"stat-text\">عدد المستخدمين</div>
                            <div class=\"stat-digit\"> <i class=\"fa fa-users\"></i>";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["usersCount"] ?? null), "html", null, true);
        yield "</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-lg-12\">
                <div class=\"card\">
                    <div class=\"card-header\">
                        <h4 class=\"card-title\">التنبيهات</h4>
                    </div>
                    <div class=\"card-body\">
                        <ul>
                            ";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["alerts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["alert"]) {
            // line 44
            yield "                                <li>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["alert"], "html", null, true);
            yield "</li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['alert'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        yield "                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/dashboard.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  108 => 46,  99 => 44,  95 => 43,  78 => 29,  65 => 19,  52 => 9,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "admin/dashboard.twig", "/Users/ialgrafi/FactoTrack/resources/views/admin/dashboard.twig");
    }
}
