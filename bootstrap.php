
(function() {

// current chat (last created)
var smartsuppChat = parent.smartsupp.chats[smartchatId]; // global chat id
// async workaround
var smartsuppLoadInterval = setInterval(function() {
	if (!window.miwo) return; // wait until libs are loaded async
	clearInterval(smartsuppLoadInterval);
	miwo.ready(function() {
		// add internal google analytics
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		// setup
		miwo.cookie.document = parent.document;
		miwo.baseUrl = smartsuppChat.getOption('baseUrl');
		miwo.staticUrl = smartsuppChat.getOption('staticUrl');

		// dashboard data
		var data = {"package":"trial","lang":"en","orientation":"right","hideBanner":false,"hideWidget":false,"hideOfflineBanner":true,"enableRating":true,"ratingComment":false,"requireLogin":false,"hideOfflineChat":false,"muteSounds":false,"isEnabledEvents":true,"banner":{"type":"arrow","options":{}},"translates":{"online":{},"offline":{},"widget":{},"banner":{}},"colors":{"primary":"#3598dc","banner":"#494949"},"theme":{"name":"flat","options":{"widgetRadius":3}},"online":{},"offline":{},"api":{"basic":true,"banner":true,"events":true,"groups":true,"theme":true}};
		data.baseLang = 'en';
		data.browserLang = 'fr';
		data.avatar = '';
		data.host = 's27.smartsupp.com';		data.packageName = 'trial';
		data.logoUrl = '';
		data.logoSrc = '';
		data.logoSmSrc = '';
		data.smartlook = window.smartlook;

		// create configurator
		var configurator = new Miwo.Configurator();
		configurator.addConfig(App.DefaultConfig.getConfig());
		configurator.addConfig(App.ClientConfig.getConfig(data));
		configurator.addConfig(App.ChatConfig.getConfig(smartsuppChat));

		// create and run app
		configurator.ext(new Chat.ChatExtension());
		var container = configurator.createContainer();
		container.get('miwo.application').run();
	});
}, 50);

// smartlook module start
// smartlook module end

})();

