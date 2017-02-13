requirejs.config({
    baseUrl: '/assets/js',
    urlArgs: "v=" + assets_version,
    paths: {
        jquery: 'vendor/jquery',
        skills: 'page/home/skills',
        bootstrap: 'vendor/bootstrap'
    },
    shim: {
        'bootstrap' : {"deps" : ["jquery"] }
    }
});

require(['bootstrap']);

(
    function()
    {
        require(['skills']);
    }
)();
