/**
 * Theme configuration returned by the server
 * @typedef {Object} ThemeConfig
 * @property {string[]} javascript List of javascript source urls
 * @property {string[]} stylesheet List of css source urls
 * @property {ExternalResource[]} resources optional resources
 * @property {string} bubbleImage image to be shown in the chat bubble
 * @property {string} iframeSource The URL to be set as the iframe source
 * @property {string} bubbleBackgroundColor Chat bubble's background color
 * @property {Number} windowHeight Chat window height
 * @property {Number} windowWidth Chat window width
 * @property {string} chatWithUsMessage The message to show beneath the chat bubble
 * @property {boolean} hideChatbot When set to "True", chatbot will not be rendered
 * @property {string} botPosition position of the bot, valid values are {"left", "right", "center"}. Default is "right"
 * @property {string} bubbleStyle bubble display style
 */

/**
 * External Resource Description
 * @typedef {Object} ExternalResource
 * @property {string} resourceType valid values are "script", "stylesheet"
 * @property {string} resourceUrl The absolute URL identifying the resource
 */

(() => {

    const CHAT_BUBBLE_TEMPLATE_STYLE1 = `
    <div id="kenytChatBubble" class="unreadcount">
        <div id="kenytBubbleContainer" class="kchannels-container">
            <div class="kchannel-group">    
            </div>
        </div>

        <div id="messageWrapperBox" class="kpopup-container chatWithUsMessageWrapper ktext-color">
            <div class="kpopup-text chatWithUsMessage">
             
            </div>
            <button id="chatNowBtn" class="kprimary-color">Chat Now</button>
        </div>
        <div class="kbubble-container kprimary-bg kprimary-border">
            <div id="bubbleTail"></div>
            <div class="img-container">
            </div>
        </div>
        <div class="kconnectors-container kprimary-bg kprimary-border">
            <div id="krazorpay-btn" class="krazorpay-btn k-hide connector">
            </div>

            <div id="kcashfree-btn" class="kcashfree-btn k-hide connector">
            </div>
        </div>
    </div>`;

    const CHAT_BUBBLE_TEMPLATE_STYLE2 = `
    <div id="kenytChatBubble" class="unreadcount">
        <div class="kchannels-container">
            <div class="kstrip">    
            </div>
            <div class="kchannel-group">    
            </div>
        </div>
        <div class="kpopup-container ksecondary-bg ktext-color">
            <div class="kpopup-text">
            </div>
        </div>
        <div class="kbubble-container kprimary-bg">
            <div class="img-container">
            </div>
        </div>
        <div class="kconnectors-container kprimary-bg kprimary-border">
             <div id="krazorpay-btn" class="krazorpay-btn k-hide connector">
            </div>

            <div id="kcashfree-btn" class="kcashfree-btn k-hide connector">
            </div>
        </div>
    </div >`;

    const CHAT_BUBBLE_TEMPLATE_STYLE3 = `
    <div id="kenytChatBubble" class="unreadcount">
        <div id="kenytBubbleContainer" class="kchannels-container">
            <div class="kchannel-group">    
            </div>
        </div>

        <div id="messageWrapperBox" class="kpopup-container chatWithUsMessageWrapper ktext-color">
            <div class="kpopup-text chatWithUsMessage">
             
            </div>
            <button id="chatNowBtn" class="kprimary-color">Chat Now</button>
        </div>
        <div class="kbubble-container kprimary-bg kprimary-border">
            <div id="bubbleTail"></div>
            <div class="img-container">
            </div>
        </div>
        <div class="kconnectors-container kprimary-bg kprimary-border">
            <div id="krazorpay-btn" class="krazorpay-btn k-hide connector">
            </div>

            <div id="kcashfree-btn" class="kcashfree-btn k-hide connector">
            </div>
        </div>
    </div>`;

    const CHAT_BUBBLE_TEMPLATE_EMBEDDED = `
    <div id="kenytChatBubble">
        <div class="kchannels-container k-d-none">
            <div class="kstrip">    
            </div>
            <div class="kchannel-group">    
            </div>
        </div>
        <div class="kpopup-container ksecondary-bg ktext-color k-d-none">
            <div class="kpopup-text">
            </div>
        </div>
        <div class="kbubble-container kprimary-bg">
            <div class="img-container">
            </div>
        </div>
        <div class="kconnectors-container kprimary-bg kprimary-border k-d-none">
             <div id="krazorpay-btn" class="krazorpay-btn k-hide connector">
            </div>

            <div id="kcashfree-btn" class="kcashfree-btn k-hide connector">
            </div>
        </div>
    </div >`;

    const BUBBLE_PRIMARY_BG = "kprimary-bg";
    const BUBBLE_SECONDARY_BG = "ksecondary-bg";
    const BUBBLE_SECONDARY_BG_VERTICAL = "ksecondary-bg-v";
    const BUBBLE_TEXT_COLOR = "ktext-color";
    const BUBBLE_PRIMARY_COLOR = "kprimary-color";
    const BUBBLE_PRIMARY_BORDER = "kprimary-border";

    const ENDPOINT = "/api/chatwindow/getthemeconfig";
    const TRACKING_CONFIG_ENDPOINT = "/api/tracking/config"
    const PROD_PREFIX = "/botapp";
    const CHATBUBBLE_ID = "kenytChatBubble";
    const TEXTBUBBLE_ID = "kenytTextBubble";
    const WHATSAPPBUBBLE_ID = "kenytWhatsappBubble";
    const FACEBOOKBUBBLE_ID = "kenytFacebookBubble";
    const INSTAGRMBUBBLE_ID = "kenytInstagramBubble";
    const PHONEBUBBLE_ID = "kenytPhoneBubble";
    const EMAILBUBBLE_ID = "kenytEmailBubble";
    const kenytChatWindowContainerId = "chatbox-container";
    const IFRAME_ID = "kenytChatWindow";
    const SCRIPT_NAME = "bot-loader.js";
    const POSITION_RIGHT = "right";
    const UNREAD_COUNT_SESSION_KEY = "__kenytUnreadCount";
    const unreadCountAttribute = "data-unreadcount";
    const POPUP_ANIMATION_TIME_SECONDS = 2; // Open + Close
    const POPUP_READ_TIME_SECONDS = 4;
    const POPUP_WAIT_TIME_SECONDS = 10;
    const POPUP_CLOSE_AFTER_TIME = (POPUP_ANIMATION_TIME_SECONDS + POPUP_READ_TIME_SECONDS) * 1000;
    const POPUP_REOPEN_TIME = (POPUP_WAIT_TIME_SECONDS + POPUP_READ_TIME_SECONDS + 2 * POPUP_ANIMATION_TIME_SECONDS) * 1000;
    
    const CHANNEL_TYPE_WHATSAPP = "whatsapp";
    const CHANNEL_TYPE_PHONE = "phone";
    const CHANNEL_TYPE_EMAIL = "email";
    const CHANNEL_TYPE_FACEBOOK = "facebook";
    const CHANNEL_TYPE_INSTAGRAM = "instagram";
    const CHANNEL_TYPE_SMS = "sms";
    // WhatsApp window management
    var whatsappWindow = null;
    var channelConfig = null;

    const CHANNEL_ICON_ANIMATION_TIME_SECONDS = 1.5;
    const CHANNEL_ICON_BUFFER_TIME_SECONDS = 3.00;

    const positionClasses = {
        center: "position-center",
        left: "position-left",
        right: "position-right",
        bottom: "position-bottom",
    };
    const BUBBLE_DEFAULT_STYLE = "style1";
    const BUBBLE_STYLE_2 = "style2";
    const BUBBLE_STYLE_3 = "style3";
    const EMBED_STYLE = "style-embed";

    var iframeEventType = {
        UnreadMessage: 'kenytUnreadMessage',
        CustomEventDispatch: 'kenytCustomEventDispatch',
        Custom_ContactFormSubmit: 'kenyt_ContactFormSubmit', // TODO : Move them to custom event type
        GenericFormSubmit: 'kenyt_GenericFormSubmit',
        UpdateAttentionMessage: 'kenytUpdateAttentionMessage',
        FirebaseToken: 'kenytFirebaseToken',
        UserGeneratedEvent: 'user_generated_event',
        UpdateSssionPing: "update_session_ping"
    };
    var enableUserTracking = false;
    var enableWebPushNotification = false;
    var kenytChatIFrame = null;
    var googleTagManagerInitialized = false;
    var googleAnalyticsInitialized = false;
    var facebookPixelInitialized = false;
    const handleKenytEvent = (event) => {
        if (event.detail.eventType === "kenyt_Load") {
            const iframe = document.getElementById('kenytChatWindow');
            kenytChatIFrame = iframe;
            userActivityTracking();
            askForWebPushPermision();
        }
    };
    document.addEventListener('kenytEvent', handleKenytEvent);

    function userActivityTracking() {

        function getBrowserName() {
            const ua = navigator.userAgent.toLowerCase();
            if (ua.includes("edg")) return "Edge";
            if (ua.includes("opr") || ua.includes("opera")) return "Opera";
            if (ua.includes("crios")) return "Chrome";
            if (ua.includes("chrome") && !ua.includes("edg")) return "Chrome";
            if (ua.includes("firefox")) return "Firefox";
            if (ua.includes("safari") && !ua.includes("chrome") && !ua.includes("crios")) return "Safari";
            return "Unknown Browser";
        }

        function getOSName() {
            const ua = navigator.userAgent;
            if (/android/i.test(ua)) return "Android";
            if (/iphone|ipad|ipod/i.test(ua)) return "iOS";
            if (/macintosh/i.test(ua)) return "MacOS";
            if (/windows/i.test(ua)) return "Windows";
            if (/linux/i.test(ua)) return "Linux";
            return "Unknown OS";
        }

        function getPlatformName() {
            const ua = navigator.userAgent.toLowerCase();
            if (/ipad/i.test(ua)) return "Tablet";
            if (/(android|webos)/i.test(ua) && !/mobile/i.test(ua)) return "Tablet";
            if (/mobile|iphone|ipod|android/i.test(ua)) return "Mobile";
            return "Desktop";
        }

        var userEvents = {
            eventCount: 1,
            clickEventList: [],
            urlChangeEventList: [],
            sessionInfo: {
                browserName: getBrowserName(),
                osName: getOSName(),
                platformName: getPlatformName(),
                channelName: "web",
                sourceUrl: window.location.href
            }
        }

        const clearUserEvents = () => {
            userEvents = {
                eventCount: 1,
                clickEventList: [],
                urlChangeEventList: [],
                sessionInfo: {
                    browserName: getBrowserName(),
                    osName: getOSName(),
                    platformName: getPlatformName(),
                    channelName: "web",
                    sourceUrl: window.location.href
                }
            }
        }
        let startTime = 0;
        let totalTimeSpent = 0;
        let currentVisibilityState = document.visibilityState;
        let sendInterval = 10;
        // let clickTagsToTrack = response.tags;

        function startTimer() {
            startTime = Date.now();
        }

        function stopTimer() {
            if (startTime > 0) {
                const elapsedTime = Date.now() - startTime;
                totalTimeSpent += elapsedTime;
                startTime = 0; // Reset start time
            }
        }

        function logTimeSpent() {
            const url = new URL(window.location.href);
            const splitPath = url.pathname.split("/").filter(Boolean);
            userEvents.urlChangeEventList.push({
                url: `${url.protocol}//${url.hostname}${url.pathname}`,
                domainName: url.hostname,
                segment1: splitPath[0] || null,
                segment2: splitPath[1] || null,
                segment3: splitPath[2] || null,
                segment4: splitPath[3] || null,
                timespent: totalTimeSpent,
                timestamp: Date.now()
            })
            userEvents.eventCount += 1;
        }


        function handleVisibilityChange() {
            if (document.visibilityState === "visible") {
                startTimer();
            } else if (document.visibilityState === "hidden") {
                stopTimer();
            }
            currentVisibilityState = document.visibilityState;
        }

        const sendBulkEvent = () => {
            if (kenytChatIFrame && userEvents.eventCount > 0) {
                let iframeEvent = {
                    type: iframeEventType.UserGeneratedEvent,
                    value: userEvents,
                };
                kenytChatIFrame.contentWindow.postMessage(iframeEvent, kenytChatIFrame.src);
                clearUserEvents();
            }
            // setTimeout(() => (sendBulkEvent()), sendInterval * 1000);
        }

        const startSendingPing = () => {
            if (kenytChatIFrame) {
                let iframeEvent = {
                    type: iframeEventType.UpdateSssionPing
                };
                kenytChatIFrame.contentWindow.postMessage(iframeEvent, kenytChatIFrame.src);
            }
            setTimeout(() => (startSendingPing()), 60 * 1000);
        }

        if (enableUserTracking && kenytChatIFrame) {
            // window.addEventListener('click', (event) => {    
            //     const tagType = event.target.tagName;
            //     console.log(tagType);
            //     if (clickTagsToTrack.some(e => e === tagType)) {
            //         userEvents.clickEventList.push({
            //             // element: event.composedPath().map((el) => el.localName || "").join(" > "),
            //             type: tagType,
            //             innerText: event.target.innerText,
            //             posX: event.clientX,
            //             posY: event.clientY,
            //             url: window.location.href,
            //             timestamp: Date.now()
            //         })
            //         userEvents.eventCount += 1;
            //     }
            // });
            document.addEventListener("visibilitychange", handleVisibilityChange);
            window.addEventListener("beforeunload", () => {
                stopTimer();
                logTimeSpent();
                sendBulkEvent();
                window.removeEventListener("beforeunload");
            });
            startTimer();
            sendBulkEvent();
            startSendingPing();
        }
    }

    function askForWebPushPermision() {
        if (enableWebPushNotification && kenytChatIFrame) {
            saveFirebaseToken();
        }
    }

    var scriptElement;
    for (let i = 0; i < document.scripts.length; i++) {
        if (document.scripts[i].src.indexOf(SCRIPT_NAME) >= 0) {
            scriptElement = document.scripts[i];
            break;
        }
    }

    var API_ENDPOINT;
    var botName, rootUrl = "", botPosition, botPositionClass, bubbleStyle, isTestMode;
    var origin;
    var unreadMessageCount = 0;
    var nextUnreadMessage = null;

    // polyfill for String.startsWith() to work in Internet Explorer
    if (!String.prototype.startsWith) {
        String.prototype.startsWith = function (searchString, position) {
            position = position || 0;
            return this.substring(position, position + searchString.length) === searchString;
        };
    }

    // Components of the chat bubble
    var kenytChatBubble = {
        element: null,
        primaryColor: null,
        opacity: null,
        textColor: null,
        style: null,

        channelContainer: {
            element: null,
            group: null,
            channels: [],
            iconElements: [],
        },
        popupContainer: {
            element: null,
            container: null,
            config: null,
        },
        bubbleContainer: {
            element: null,
            imageUrl: null,
        },
        connectorContainer: {
            element: null,
            razorpay: {
                element: null,
                btn: null,
            },
            cashfree: {
                element: null,
                btn: null
            }
        },
        stripAnimation: null,
    };
    let chatWindow = {};
    let firebaseAppConfig = null;

    // Initialize chat window
    (() => {
        rootUrl = extractRootUrl();
        botName = getScriptParam("data-bot");
        botPosition = getScriptParam("data-position");
        bubbleStyle = getScriptParam("data-bubblestyle");
        isTestMode = (getScriptParam("data-istest") || "").toLowerCase() === "true";
        document.kenytRootUrl = rootUrl;

        //https://stackoverflow.com/questions/4540753/should-i-use-encodeuri-or-encodeuricomponent-for-encoding-urls
        origin = window.location.href;
        API_ENDPOINT = detectEndPoint();

        if (!botName && origin.indexOf("myshopify.com") > 0) {
            botName = origin;
        }

        if (!botName) {
            console.error("[Kenyt.AI] Invalid botname parameter");
        }
        // Stop the process if botname is missing/null
        else {
            var request = new XMLHttpRequest();
            request.addEventListener('load', () => {
                let response = JSON.parse(request.response);
                bootstrap(response);
            });
            request.open("GET", `${API_ENDPOINT}?botid=${botName}`, true);
            request.send();
        }
    })();

    /**
     * Create basic layouts and containers 
     * @param {ThemeConfig} themeConfig 
     */
    function bootstrap(themeConfig) {
        // Store themeConfig globally for WhatsApp functionality
        channelConfig = themeConfig?.bubble?.channelConfig;
        
        if (!botPosition && themeConfig.botPosition && typeof themeConfig.botPosition === 'string') {
            let position = themeConfig.botPosition.trim().toLowerCase();
            if (position) {
                botPosition = position;
            }
        }

        if (themeConfig && themeConfig.userActivityTracking) {
            enableUserTracking = themeConfig.userActivityTracking;
            const origin = window.location.href;
            if ((origin.indexOf("kenyt.ai/dashboard") > 0) || (origin.indexOf("kenyt.ai/botapp") > 0)) {
                enableUserTracking = false;
            }
            userActivityTracking();
        }

        if (themeConfig && themeConfig.enableWebPushNotifications) {
            enableWebPushNotification = themeConfig.enableWebPushNotifications;
            askForWebPushPermision();
        }

        //bubbleStyle = "style1";
        if (!bubbleStyle && themeConfig.bubbleStyle && typeof themeConfig.bubbleStyle === 'string') {
            bubbleStyle = themeConfig.bubbleStyle;
        }

        botPositionClass = getPositionClass(botPosition);
        //let hideChatbot = themeConfig.hideChatbot && window.location.host.indexOf("kenyt.ai") < 0;
        let hideChatbot = themeConfig.hideChatbot;
        let hideChatbotv2 = themeConfig.hideChatbotV2;
        if (hideChatbotv2) {
            hideChatbot = hideChatbotv2;
        }

        createChatBubble(themeConfig.bubble, bubbleStyle, botPositionClass);

        function loadChatbot() {

            let isHideChatbot = false;
            if (hideChatbot == "All" ||
                (hideChatbot == "Mobile" && isMobileDevice()) ||
                (hideChatbot == "Desktop" && !isMobileDevice())
            ) {
                isHideChatbot = true && window.location.host.indexOf("kenyt.ai") < 0;
            }

            chatWindow = document.getElementById(kenytChatWindowContainerId)
            if (!chatWindow) {
                chatWindow = createChatWindow(
                    themeConfig.iframeSource,
                    themeConfig.botType,
                    themeConfig.deviceSettings,
                    isHideChatbot,
                    botPositionClass,
                    isTestMode,
                    themeConfig.setUserDataForBot,
                    themeConfig.hideChatHistory,
                    themeConfig.enablePortal,
                    themeConfig.enableHomePortal,
                    themeConfig.enableMessagePortal,
                    themeConfig.forms,
                    themeConfig.enableMessageFeedback
                );
            }

            chatWindow.classList.add(bubbleStyle);
            if (!document.body) {
                console.error('[Kenyt.AI] Cannot inject chatbot - Document load complete, but missing body');
                console.error(document);
                // Try again after 2 secs
                setTimeout(loadChatbot, 2000);
            }
            else {
                if (document.kenytBotLoaded && document.kenytBotLoaded === botName) {
                    console.warn('[Kenyt.AI] Loader script imported more than once, ignoring duplicate loads');
                }
                else {
                    if (document.kenytBotLoaded && document.kenytBotLoaded !== botName) {
                        var oldChatBubble = document.getElementById(CHATBUBBLE_ID);
                        if (oldChatBubble) {
                            oldChatBubble.remove();
                        }
                        var oldChatWindow = document.getElementById(IFRAME_ID);
                        if (oldChatWindow) {
                            oldChatWindow.remove();
                        }
                    }

                    document.kenytBotLoaded = botName;
                    if (isHideChatbot) {
                        kenytChatBubble.element.style.display = "none";
                        chatWindow.style.display = "none";
                    }
                    else {
                        initializeGoogleTagManager(themeConfig);
                        injectScripts(themeConfig);
                    }
                }
            }

            window.addEventListener('message', function (event) {
                // TODO: add a origin check
                if (typeof event.data === "object" && event.data.type) {
                    /**
                     * @type {IframeEvent}
                     */
                    let iframeEvent = event.data;

                    // Handle WhatsApp window requests from iframe
                    if (iframeEvent.type === 'openWhatsAppWindow') {
                        openWhatsAppWindow();
                        return;
                    }
                    
                    if (iframeEvent.type === 'closeWhatsAppWindow') {
                        closeWhatsAppWindow();
                        return;
                    }

                    // Handle WhatsApp URL opening from iframe
                    if (iframeEvent.type === 'openWhatsAppUrl') {
                        openWhatsAppUrl(iframeEvent.url);
                        return;
                    }

                    // Handle Email window requests from iframe
                    if (iframeEvent.type === 'openEmailWindow') {
                        openEmailWindow();
                        return;
                    }
                    
                    if (iframeEvent.type === 'closeEmailWindow') {
                        closeEmailWindow();
                        return;
                    }

                    // Handle Phone window requests from iframe
                    if (iframeEvent.type === 'openPhoneWindow') {
                        openPhoneWindow();
                        return;
                    }
                    
                    if (iframeEvent.type === 'closePhoneWindow') {
                        closePhoneWindow();
                        return;
                    }

                    if (iframeEvent.type === iframeEventType.CustomEventDispatch) {
                        /** @type {CustomEventInfo} */
                        let eventInfo = iframeEvent.value;
                        if (eventInfo && eventInfo.EventName &&
                            eventInfo.EventName === iframeEventType.Custom_ContactFormSubmit) {

                            if (kenyt_gtag && eventInfo.EventData) {
                                kenyt_gtag('event', 'contact_form_submitted', eventInfo.EventData);
                            }

                            if (kenyt_gtag && themeConfig.googleAnalyticsEvents && themeConfig.googleAnalyticsEvents[iframeEventType.Custom_ContactFormSubmit]) {
                                triggerConfiguredGoogleAnalyticsEvents(themeConfig.googleAnalyticsEvents[iframeEventType.Custom_ContactFormSubmit]);
                            }

                            if (themeConfig.facebookPixelId) {
                                initializeFacebookPixel(themeConfig);
                                if (typeof fbq !== 'undefined' && fbq) {
                                    fbq('track', 'Lead');
                                }
                            }

                            //https://developers.google.com/tag-manager/devguide#migration
                            if (themeConfig.googleTagManagerId) {
                                initializeGoogleTagManager(themeConfig);
                                window.dataLayer = window.dataLayer || [];
                                var leadEventData = {
                                    event: 'contact_form_submitted'
                                };
                                if (eventInfo.EventData && typeof eventInfo.EventData === 'object') {
                                    Object.keys(eventInfo.EventData).forEach(function (key) {
                                        leadEventData[key] = eventInfo.EventData[key];
                                    });
                                }
                                window.dataLayer.push(leadEventData);
                            }
                        }
                    }
                    else if (iframeEvent.type === iframeEventType.UnreadMessage) {

                        unreadMessageCount = getUnreadMessageCount();
                        unreadMessageCount += 1;
                        if (unreadMessageCount > 0) {
                            setUnreadMessageCount(unreadMessageCount);
                        }

                        //this.alert(iframeEvent.value);
                        if (themeConfig.toggleAttentionMessage &&
                            iframeEvent.value && !nextUnreadMessage) {
                            nextUnreadMessage = {};
                            nextUnreadMessage.markedEle = iframeEvent.value;
                        }
                    }
                    else if (iframeEvent.type === iframeEventType.UpdateAttentionMessage) {
                        var data = {};
                        if (iframeEvent.value) {
                            data.text = iframeEvent.value;
                            setPopupText(data);
                        }
                        else {
                            setPopupText(kenytChatBubble.popupContainer.config);
                        }
                    }
                    else if (iframeEvent.type === iframeEventType.FirebaseToken) {
                        saveFirebaseToken();
                    }
                }
            }, false);
        }

        let loadMode = themeConfig.loadMode || "Normal";

        //https://stackoverflow.com/questions/9899372/pure-javascript-equivalent-of-jquerys-ready-how-to-call-a-function-when-t
        if (document.readyState === "complete" || document.readyState === "interactive") {

            switch (loadMode) {
                case "Delayed":
                    window.setTimeout(() => { loadChatbot(); }, 5000);
                    break;
                case "Quick":
                default:
                    loadChatbot();
                    break;
            }
        }
        else {
            switch (loadMode) {
                case "Quick":
                    loadChatbot();
                    break;
                case "Delayed":
                    window.setTimeout(() => { loadChatbot(); }, 5000);
                    break;
                default:
                    window.addEventListener('DOMContentLoaded', () => {
                        loadChatbot();
                    });
                    break;
            }
        }

        if (themeConfig.firebaseConfig) {
            firebaseAppConfig = themeConfig.firebaseConfig;
        }
    }

    function renderChatbot(themeConfig) {

        if (kenytChatBubble.embedElement) {
            kenytChatBubble.embedElement.appendChild(kenytChatBubble.element);
        }
        else {
            document.body.appendChild(kenytChatBubble.element);
        }

        toggleUnreadMessages();
        if (kenytChatBubble.channelContainer.iconElements &&
            kenytChatBubble.channelContainer.iconElements.length) {

            animateChannelIcon(kenytChatBubble.channelContainer.iconElements, kenytChatBubble.channelContainer.iconElements.length - 1);
        }

        if (themeConfig.bubble.shakeInterval > 0) {

            setInterval(() => {
                try {
                    kenytChatBubble.bubbleContainer.element.classList.remove("shake")
                    void kenytChatBubble.bubbleContainer.element.offsetWidth;
                } catch (e) {
                    console.log(e)
                }

                kenytChatBubble.bubbleContainer.element.classList.add("shake")

            }, Number(themeConfig.bubble.shakeInterval) * 1000)
        }

        if (!bubbleStyle || bubbleStyle === BUBBLE_DEFAULT_STYLE) {

            //var bubbleTailEle = document.getElementById("bubbleTail");
            //bubbleTailEle.style.borderTopColor = themeConfig.bubble.primaryColor;
        }
        else {
            setInterval(function () { toggleUnreadMessages(); }, POPUP_REOPEN_TIME);
        }

        // prevent chat window positioning for all other bubble styles except style1
        document.body.appendChild(chatWindow);

        initializeGoogleAnalytics(themeConfig);
        initializeFacebookPixel(themeConfig);
    }

    function toggleUnreadMessages() {
        if (nextUnreadMessage) {
            setPopupText(nextUnreadMessage);
            nextUnreadMessage = null;
        }
        else {
            setPopupText(kenytChatBubble.popupContainer.config);
        }
    }

    function animateChannelIcon(iconElements, index) {
        if (iconElements && iconElements.length) {
            if (index < 0) {
                index = iconElements.length - 1;
            }

            var iconEle = iconElements[index];
            iconEle.classList.add("kanimate");
            window.setTimeout(
                () => {
                    iconEle.classList.remove("kanimate");
                    window.setTimeout(
                        () => {
                            animateChannelIcon(iconElements, index - 1);
                        }, CHANNEL_ICON_BUFFER_TIME_SECONDS * 1000);
                }, CHANNEL_ICON_ANIMATION_TIME_SECONDS * 1000);
        }
    }

    /**
     * Inject stylesheets and script tags
     * @param {ThemeConfig} themeConfig 
     */
    function injectScripts(themeConfig) {
        if (themeConfig) {

            var renderOnLoad = true

            themeConfig.stylesheet.forEach(linkUrl => {
                document.head.appendChild(createLinkNode(`${rootUrl}${linkUrl}`, renderOnLoad, themeConfig));
                renderOnLoad = false;
            });

            themeConfig.resources.forEach(externalResource => {
                externalResource.resourceType = externalResource.resourceType || '';

                let firstStylesheet = document.head.getElementsByTagName("link");
                if (firstStylesheet && firstStylesheet.length > 0) {
                    firstStylesheet = firstStylesheet[0];
                }
                else {
                    firstStylesheet = null;
                }

                {
                    switch (externalResource.resourceType) {
                        case 'script':
                            if (externalResource.resourceUrl) {
                                document.head.appendChild(createScriptNode(externalResource.resourceUrl));
                            }
                            else if (externalResource.resourceContent) {

                                //document.head.appendChild(createScriptNodeByContent(externalResource.resourceContent));
                            }
                            break;
                        case 'stylesheet':
                            if (externalResource.resourceUrl) {
                                let linkNode = createLinkNode(externalResource.resourceUrl);
                                if (firstStylesheet) {
                                    document.head.insertBefore(linkNode, firstStylesheet);
                                }
                                else {
                                    document.head.appendChild(linkNode);
                                }
                            }
                            break;
                        default:
                            console.warn('Unknown external resource type ignored', externalResource.resourceType);
                    }
                }
            });
            if (themeConfig.customCss) {
                let styleNode = document.createElement("style");
                styleNode.innerText = themeConfig.customCss;
                document.head.appendChild(styleNode);
            }
        }
    }

    function initializeGoogleTagManager(themeConfig) {
        if (googleTagManagerInitialized || !themeConfig || !themeConfig.googleTagManagerId) {
            return;
        }

        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        document.head.appendChild(createScriptNode("https://www.googletagmanager.com/gtm.js?id=" + themeConfig.googleTagManagerId, true));
        googleTagManagerInitialized = true;
    }

    function initializeGoogleAnalytics(themeConfig) {
        if (googleAnalyticsInitialized || !themeConfig || !themeConfig.googleAnalyticsId) {
            return;
        }

        var trackingId = themeConfig.googleAnalyticsId;
        if (typeof gtag !== 'undefined' && gtag) {
            kenyt_gtag = gtag;
            kenyt_gtag('config', trackingId);
            googleAnalyticsInitialized = true;
            return;
        }

        window.dataLayer = window.dataLayer || [];
        kenyt_gtag('js', new Date());
        kenyt_gtag('config', trackingId);
        document.head.appendChild(createScriptNode("https://www.googletagmanager.com/gtag/js?id=" + trackingId, true));
        googleAnalyticsInitialized = true;
    }

    function triggerConfiguredGoogleAnalyticsEvents(eventConfig) {
        if (!kenyt_gtag || !eventConfig) {
            return;
        }

        var configs = Array.isArray(eventConfig) ? eventConfig : [eventConfig];
        configs.forEach(function (config) {
            if (!config) {
                return;
            }

            if (typeof config === 'string') {
                executeGoogleAnalyticsCallString(config);
                return;
            }

            if (typeof config === 'object') {
                if (config.event) {
                    var params = config.params || config.data || {};
                    if (typeof params !== 'object') {
                        params = {};
                    }
                    kenyt_gtag('event', config.event, params);
                    return;
                }

                for (var key in config) {
                    if (config.hasOwnProperty(key)) {
                        kenyt_gtag('event', key, config[key]);
                    }
                }
            }
        });
    }

    function executeGoogleAnalyticsCallString(callExpression) {
        if (!callExpression || typeof callExpression !== 'string') {
            return;
        }

        var trimmedExpression = callExpression.trim();
        if (trimmedExpression.indexOf("gtag(") !== 0) {
            return;
        }

        try {
            var safeExpression = trimmedExpression.replace(/\bgtag\b/g, 'kenyt_gtag');
            var executor = new Function('kenyt_gtag', safeExpression);
            executor(kenyt_gtag);
        } catch (error) {
            console.error('[Kenyt.AI] Failed to execute googleAnalyticsEvents entry', error);
        }
    }

    function initializeFacebookPixel(themeConfig) {
        if (!themeConfig || !themeConfig.facebookPixelId || facebookPixelInitialized) {
            if (themeConfig && themeConfig.facebookPixelId && typeof fbq !== 'undefined' && fbq) {
                facebookPixelInitialized = true;
            }
            return;
        }

        var pixelId = themeConfig.facebookPixelId;
        if (typeof fbq === 'undefined' || !fbq) {
            (function (f, b, e, v, n, t, s) {
                if (f.fbq) return; n = f.fbq = function () {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
                n.queue = []; t = b.createElement(e); t.async = !0;
                t.src = v; s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            })(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
        }

        fbq('init', pixelId);
        fbq('track', 'PageView');

        var img = document.createElement("img");
        img.src = "https://www.facebook.com/tr?id=" + pixelId + "&ev=PageView&noscript=1";
        img.height = "1";
        img.width = "1";
        img.style = "display:none";
        img.alt = "";
        img.setAttribute("role", "presentation");
        document.body.appendChild(img);

        facebookPixelInitialized = true;
    }

    function createScriptNode(scriptUrl, isAsync, renderOnLoad) {
        let scriptNode = document.createElement("script");
        scriptNode.setAttribute("src", scriptUrl);
        scriptNode.type = "text/javascript";
        scriptNode.async = isAsync;

        if (scriptUrl.indexOf("portal.js") > -1) {
            Object.entries(scriptElement.attributes).map(([key, value]) => {
                if (key.startsWith("data-")) {
                    scriptNode.setAttribute(key, value);
                }
            })
        }

        if (renderOnLoad) {
            scriptNode.onload = function () {
                var window = document.getElementById(IFRAME_ID);
                var srcUrl = window.getAttribute("src_to_set");
                if (srcUrl) {
                    window.removeAttribute("src_to_set");
                    window.setAttribute("src", srcUrl);
                }
            }
        }

        return scriptNode;
    }

    function createScriptNodeByContent(content) {
        let scriptNode = document.createElement("script");

        scriptNode.text = content;

        return scriptNode;
    }

    function createLinkNode(stylesheetUrl, renderOnLoad, themeConfig) {
        let linkNode = document.createElement("link");
        linkNode.setAttribute("href", stylesheetUrl);
        linkNode.rel = "stylesheet";

        if (renderOnLoad) {
            linkNode.onload = function () {
                renderChatbot(themeConfig);
                themeConfig.javascript.forEach(scriptUrl => {
                    document.head.appendChild(createScriptNode(`${rootUrl}${scriptUrl}`, false, renderOnLoad));
                    if (renderOnLoad) {
                        let nsEle = document.createElement("noscript");
                        nsEle.innerHTML = "Enable JavaScript to use the Generative AI powered Kenyt<a href=\"https://www.kenyt.ai/\" rel=\"noopener nofollow\" target=\"_blank\">AI chatbot</a> or AI Assistant.";
                        document.head.appendChild(nsEle);
                    }
                    renderOnLoad = false;
                });
            }
        }
        return linkNode;
    }

    /**
     * Create a floating chat bubble
     * @param {ThemeConfig} themeConfig 
     * @param {string} position
     */
    function createChatBubble(themeConfig, styleClass, positionClass) {
        kenytChatBubble = {};

        var bubbleTemplate = CHAT_BUBBLE_TEMPLATE_STYLE1;
        if (!styleClass || styleClass === BUBBLE_DEFAULT_STYLE) {
            styleClass = BUBBLE_DEFAULT_STYLE;
            bubbleTemplate = CHAT_BUBBLE_TEMPLATE_STYLE1;
        }
        else if (styleClass === BUBBLE_STYLE_2) {
            styleClass = BUBBLE_STYLE_2;
            bubbleTemplate = CHAT_BUBBLE_TEMPLATE_STYLE2;
        }
        else {
            styleClass = BUBBLE_STYLE_3;
            bubbleTemplate = CHAT_BUBBLE_TEMPLATE_STYLE3;
        }

        if (themeConfig.embedElementId) {
            kenytChatBubble.embedElement = document.getElementById(themeConfig.embedElementId);
            if (kenytChatBubble.embedElement) {
                styleClass = EMBED_STYLE;
                bubbleTemplate = CHAT_BUBBLE_TEMPLATE_EMBEDDED;
            }
        }

        kenytChatBubble.element = htmlToElement(bubbleTemplate);
        kenytChatBubble.element.classList.add(styleClass);
        kenytChatBubble.element.classList.add(positionClass);

        // Popup Container
        kenytChatBubble.popupContainer = {};
        kenytChatBubble.popupContainer.element = kenytChatBubble.element.getElementsByClassName("kpopup-container")[0];
        kenytChatBubble.popupContainer.container = kenytChatBubble.popupContainer.element.getElementsByClassName("kpopup-text")[0];

        // Channel Container
        kenytChatBubble.channelContainer = {};
        kenytChatBubble.channelContainer.element = kenytChatBubble.element.getElementsByClassName("kchannels-container")[0];
        kenytChatBubble.channelContainer.container = kenytChatBubble.element.getElementsByClassName("kchannel-group")[0];
        kenytChatBubble.channelContainer.strip = kenytChatBubble.element.getElementsByClassName("kstrip")[0];
        kenytChatBubble.channelContainer.iconElements = [];

        // Bubble Container
        kenytChatBubble.bubbleContainer = {};
        kenytChatBubble.bubbleContainer.element = kenytChatBubble.element.getElementsByClassName("kbubble-container")[0];
        kenytChatBubble.bubbleContainer.container = kenytChatBubble.element.getElementsByClassName("img-container")[0];
        if (kenytChatBubble.bubbleContainer.container && themeConfig.bubbleBackgroundColor) {
            kenytChatBubble.bubbleContainer.container.style.backgroundColor = themeConfig.bubbleBackgroundColor;
        }

        // Connector Container
        kenytChatBubble.connectorContainer = {};
        kenytChatBubble.connectorContainer.element = kenytChatBubble.element.getElementsByClassName("kconnectors-container")[0];
        if (kenytChatBubble.connectorContainer.element) {
            kenytChatBubble.connectorContainer.razorpay = {};
            kenytChatBubble.connectorContainer.razorpay.element = kenytChatBubble.connectorContainer.element.getElementsByClassName("krazorpay-btn")[0];
            kenytChatBubble.connectorContainer.element.style.backgroundColor = themeConfig.bubbleBackgroundColor;

            kenytChatBubble.connectorContainer.cashfree = {};
            kenytChatBubble.connectorContainer.cashfree.element = kenytChatBubble.connectorContainer.element.getElementsByClassName("kcashfree-btn")[0];
        }

        if (!styleClass || styleClass === BUBBLE_DEFAULT_STYLE) {
            if (!themeConfig.popupConfig.text) {
                kenytChatBubble.popupContainer.element.style.display = "none";
            }
        }
        else {
            kenytChatBubble.popupContainer.element.style.animationDuration = POPUP_ANIMATION_TIME_SECONDS + "s";
            //kenytChatBubble.channelContainer.strip.style.animationDuration = POPUP_ANIMATION_TIME_SECONDS + "s";
        }

        kenytChatBubble.popupContainer.element.style.color = themeConfig.textColor;
        kenytChatBubble.popupContainer.config = themeConfig.popupConfig;

        if (themeConfig.channelConfig &&
            themeConfig.channelConfig.channels &&
            themeConfig.channelConfig.channels.length) {
            themeConfig.channelConfig.channels.forEach(channelEntry => {

                var channelDetails = getChannelDetails(channelEntry, themeConfig.ipAddress);
                if (channelDetails && channelEntry.imageUrl) {
                                        
                    let channelIcon;
                    const isPhone = channelEntry.type === CHANNEL_TYPE_PHONE;
                    const isEmail = channelEntry.type === CHANNEL_TYPE_EMAIL;

                    switch (channelEntry.type) {
                        case CHANNEL_TYPE_PHONE:
                            if (channelDetails.useNewChatWindow) {
                                channelIcon = document.createElement("div");
                            } else {
                                channelIcon = document.createElement("a");
                                if (channelDetails.link) {
                                    channelIcon.target = "_blank";
                                    channelIcon.href = channelDetails.link;
                                }
                            }
                            break;

                        case CHANNEL_TYPE_EMAIL:
                            channelIcon = document.createElement("div");
                            break;

                        case CHANNEL_TYPE_WHATSAPP:
                        case CHANNEL_TYPE_SMS:
                        case CHANNEL_TYPE_FACEBOOK:
                        case CHANNEL_TYPE_INSTAGRAM:
                        default:
                            channelIcon = document.createElement("a");
                            if (channelDetails.link) {
                                channelIcon.target = "_blank";
                                channelIcon.href = channelDetails.link;
                            }
                            break;
                    }

                    channelIcon.id = channelDetails.id;
                    channelIcon.classList.add("kchannel-icon");

                    if (isPhone || isEmail) {
                        channelIcon.style.display = "flex";
                        channelIcon.style.alignItems = "center";
                        channelIcon.style.justifyContent = "center";
                    }
                    
                    switch (channelEntry.type) {
                        case CHANNEL_TYPE_WHATSAPP:
                            channelIcon.addEventListener('click', function(event) {
                                event.preventDefault();
                                event.stopPropagation();
                                if (channelDetails.useNewChatWindow) {
                                    openWhatsAppWindow();
                                } else {
                                    // Directly open WhatsApp link in new tab
                                    let whatsappLink = channelDetails.link;
                                    // Append text if body exists
                                    if (channelEntry.body) {
                                        whatsappLink += encodeURIComponent(channelEntry.body);
                                    }
                                    window.open(whatsappLink, '_blank');
                                }
                            });
                            break;
                        
                        case CHANNEL_TYPE_EMAIL:
                            channelIcon.addEventListener('click', function(event) {
                                event.preventDefault();
                                event.stopPropagation();
                                openEmailWindow();
                            });
                            break;
                        
                        case CHANNEL_TYPE_PHONE:
                            channelIcon.addEventListener('click', function(event) {
                                event.preventDefault();
                                event.stopPropagation();
                                if (channelDetails.useNewChatWindow) {
                                    openPhoneWindow();
                                } else {
                                    // Directly open phone link (tel:) in new tab/window
                                    window.open(channelDetails.link, '_blank');
                                }
                            });
                            break;
                    }

                    // Background circle span (will contain the icon)
                    var bkgElement = document.createElement("span");
                    bkgElement.classList.add("khighlight-background");
                    if (channelEntry.type === CHANNEL_TYPE_WHATSAPP) {
                        bkgElement.style.position = "relative";
                        bkgElement.style.left = "0";
                        bkgElement.style.transform = "none";
                        bkgElement.style.margin = "auto";
                    }

                    if ((isPhone && channelDetails.useNewChatWindow) || isEmail){
                        // Inline layout for circular bubble and centering
                        bkgElement.style.borderRadius = "50%";
                        bkgElement.style.display = "flex";
                        bkgElement.style.position = "relative";
                        bkgElement.style.top = "0";
                        bkgElement.style.left = "0";
                        bkgElement.style.transform = "none";
                        bkgElement.style.height = "80%";
                        bkgElement.style.width = "80%";
                        bkgElement.style.justifyContent = "center";
                        bkgElement.style.alignItems = "center";
                        bkgElement.style.margin = "auto";
                    }
                    const bgColor = (channelDetails.windowThemeColor || channelEntry.color || themeConfig.primaryColor);
                    if ((isPhone && channelDetails.useNewChatWindow) || isEmail) {
                        if (bgColor) bkgElement.style.backgroundColor = bgColor;
                    } else if (channelEntry.color) {
                        bkgElement.style.backgroundColor = channelEntry.color;
                    }

                    // Icon content inside the span
                    if (isPhone && channelDetails.useNewChatWindow) {
                        var phoneIcon = document.createElement("span");
                        phoneIcon.style.marginTop = "0";
                        phoneIcon.style.display = "flex";
                        phoneIcon.style.alignItems = "center";
                        phoneIcon.style.justifyContent = "center";
                        phoneIcon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="none"><path fill="#FFFFFF" d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.79 19.79 0 0 1 2.08 4.18 2 2 0 0 1 4.06 2h3a2 2 0 0 1 2 1.72c.12.9.32 1.77.59 2.6a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.48-1.11a2 2 0 0 1 2.11-.45c.83.27 1.7.47 2.6.59A2 2 0 0 1 22 16.92z"/></svg>';
                        bkgElement.appendChild(phoneIcon);
                    } else if (isEmail) {
                        var emailIcon = document.createElement("span");
                        emailIcon.style.marginTop = "0";
                        emailIcon.style.display = "flex";
                        emailIcon.style.alignItems = "center";
                        emailIcon.style.justifyContent = "center";
                        emailIcon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="none"><path fill="#FFFFFF" d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z"/></svg>';
                        bkgElement.appendChild(emailIcon);
                    } else {
                        var channelImage = document.createElement("img");
                        channelImage.src = `${rootUrl}${channelEntry.imageUrl}`;
                        channelImage.alt = channelEntry.type ? `${channelEntry.type} channel icon` : "Channel icon";
                        channelIcon.appendChild(channelImage);
                    }

                    // Append background span last so it sits behind but contains icon for phone/email
                    channelIcon.appendChild(bkgElement);

                    kenytChatBubble.channelContainer.iconElements.push(channelIcon);
                    kenytChatBubble.channelContainer.container.appendChild(channelIcon);
                }
            });
        }
        else {
            kenytChatBubble.channelContainer.container.classList.add("k-hide");
        }

        // Unread Count from session
        unreadMessageCount = getUnreadMessageCount();
        setUnreadMessageCount(unreadMessageCount);

        // THEME Setup
        // https://stackoverflow.com/questions/3871547/js-iterating-over-result-of-getelementsbyclassname-using-array-foreach
        if (themeConfig.primaryColor) {
            var pelements = kenytChatBubble.element.getElementsByClassName(BUBBLE_PRIMARY_BG);
            Array.from(pelements).forEach(ele => {
                ele.style.backgroundColor = themeConfig.primaryColor;
            })

            pelements = kenytChatBubble.element.getElementsByClassName(BUBBLE_PRIMARY_COLOR);
            Array.from(pelements).forEach(ele => {
                ele.style.color = themeConfig.primaryColor;
            });

            pelements = kenytChatBubble.element.getElementsByClassName(BUBBLE_PRIMARY_BORDER);
            Array.from(pelements).forEach(ele => {
                ele.style.borderColor = themeConfig.primaryColor;
            });
        }

        if (themeConfig.secondaryColorGradient) {
            var selements = kenytChatBubble.element.getElementsByClassName(BUBBLE_SECONDARY_BG);
            Array.from(selements).forEach(ele => {
                ele.style.backgroundImage = themeConfig.secondaryColorGradient;
            });

            if (themeConfig.secondaryColorVGradient) {
                selements = kenytChatBubble.element.getElementsByClassName(BUBBLE_SECONDARY_BG_VERTICAL);
                Array.from(selements).forEach(ele => {
                    ele.style.backgroundImage = themeConfig.secondaryColorVGradient;
                });
            }
        }
        else if (themeConfig.secondaryColor) {
            var bgelements = kenytChatBubble.element.getElementsByClassName(BUBBLE_SECONDARY_BG);
            Array.from(bgelements).forEach(ele => {
                ele.style.backgroundColor = themeConfig.secondaryColor;
            });
        }

        if (themeConfig.imageUrl) {
            var imgEle = document.createElement("img");
            imgEle.src = `${rootUrl}${themeConfig.imageUrl}`;
            if (themeConfig.altTextLOGO && themeConfig.altTextLOGO.length > 0) {
                imgEle.alt = themeConfig.altTextLOGO;
            } else {
                imgEle.alt = "Chatbot avatar";
            }
            kenytChatBubble.bubbleContainer.container.appendChild(imgEle);
        }

        if (themeConfig.textColor) {
            var tcelements = kenytChatBubble.element.getElementsByClassName(BUBBLE_TEXT_COLOR);
            Array.from(tcelements).forEach(ele => {
                ele.style.color = themeConfig.textColor;
            });
        }
    }

    function setPopupText(data) {

        if (data) {
            var contentEle = data.markedEle;
            if (!contentEle && data.text) {
                contentEle = "<p>" + data.text + "</p>";
            }

            if (contentEle) {
                removeAllChildNodes(kenytChatBubble.popupContainer.container);
                kenytChatBubble.popupContainer.element.classList.remove("k-hide");
                //kenytChatBubble.channelContainer.element.classList.remove("k-hide");

                kenytChatBubble.popupContainer.element.classList.add("kpopup-holdanimation");
                kenytChatBubble.popupContainer.container.style.minWidth = "75px";
                kenytChatBubble.popupContainer.container.innerHTML = contentEle;

                let maxWidth = 240;
                if (isMobileDevice() &&
                    bubbleStyle === BUBBLE_STYLE_2 &&
                    document.body.clientWidth) {
                    maxWidth = 0.7 * (document.body.clientWidth - 90);
                }

                let popupWidth = kenytChatBubble.popupContainer.container.clientWidth - 90;
                if (popupWidth > maxWidth) {
                    popupWidth = maxWidth;
                }
                kenytChatBubble.popupContainer.container.style.minWidth = popupWidth + "px";
                kenytChatBubble.popupContainer.element.classList.remove("kpopup-holdanimation");

                window.setTimeout(
                    () => {
                        kenytChatBubble.popupContainer.element.classList.add("k-hide");
                        //kenytChatBubble.channelContainer.element.classList.add("k-hide");
                    }, POPUP_CLOSE_AFTER_TIME);
            }
        }
    }

    function getChannelDetails(channelEntry, ipAddress) {
        let channelDetails = {};
        channelDetails.render = true;
        channelEntry.body = channelEntry.body || "hi";
        if (channelEntry && channelEntry.type && channelEntry.number) {

            switch (channelEntry.type) {
                case CHANNEL_TYPE_SMS:
                    if (isMobileDevice()) {
                        var smsdeviceOS = getMobileOperatingSystem();
                        var delimeter = "?";
                        if (smsdeviceOS === "iOS") {
                            delimeter = "&";
                        }
                        channelDetails.link = "sms:" + encodeURIComponent(channelEntry.number) +
                            delimeter + "body=" + encodeURIComponent(channelEntry.body);
                    }
                    channelDetails.id = TEXTBUBBLE_ID;
                    break;
                case CHANNEL_TYPE_WHATSAPP:
                    var wadeviceOS = getMobileOperatingSystem();
                    if (wadeviceOS === "iOS") {
                        if (channelEntry.number && channelEntry.number.startsWith('+')) {
                            channelEntry.number = channelEntry.number.substr(1);
                        }
                    }
                    let text = channelEntry.body;
                    if (channelEntry.trackCampaigns) {
                        let contentToEncode = "";
                        if (isMobileDevice()) {
                            contentToEncode = window.location.href;
                        }
                        if (ipAddress) {
                            contentToEncode = ipAddress + " " + contentToEncode;
                        }
                        text = getBase4EncodedUrl(contentToEncode) + channelEntry.body;
                    }
                    channelDetails.link = "https://api.whatsapp.com/send?phone=" +
                        channelEntry.number + "&text=";
                    channelDetails.id = WHATSAPPBUBBLE_ID;
                    channelDetails.windowThemeColor = "#128C7E";
                    channelDetails.contentTitle = channelEntry.contentTitle || "";
                    channelDetails.contentSubtitle = channelEntry.contentSubtitle || "";
                    channelDetails.headerTitle = channelEntry.headerTitle || "";
                    channelDetails.initialMessage = channelEntry.body || "Hi";
                    channelDetails.useNewChatWindow = channelEntry.useNewChatWindow;
                    break;
                case CHANNEL_TYPE_FACEBOOK:
                    var host = (isMobileDevice()) ? "http://m.me/" : "https://www.messenger.com/t/";
                    channelDetails.link = host + channelEntry.number + "/";
                    channelDetails.id = FACEBOOKBUBBLE_ID;
                    break;
                case CHANNEL_TYPE_INSTAGRAM:
                    channelDetails.link = "https://www.instagram.com/" + channelEntry.number + "/";
                    channelDetails.id = INSTAGRMBUBBLE_ID;
                    break;
                case CHANNEL_TYPE_PHONE:
                    {
                        channelDetails.link = "tel:" + channelEntry.number;
                    }
                    channelDetails.id = PHONEBUBBLE_ID;
                    channelDetails.windowThemeColor = channelEntry.windowThemeColor || "#007bff";
                    channelDetails.contentTitle = channelEntry.contentTitle || "";
                    channelDetails.contentSubtitle = channelEntry.contentSubtitle || "";
                    channelDetails.headerTitle = channelEntry.headerTitle || "";
                    channelDetails.useNewChatWindow = channelEntry.useNewChatWindow;
                    break;
                case CHANNEL_TYPE_EMAIL:
                    {
                        let mailtoLink = "mailto:" + channelEntry.number;
                        let params = [];
                        if (channelEntry.subject && channelEntry.subject.trim() !== "") {
                            params.push("subject=" + encodeURIComponent(channelEntry.subject));
                        }
                        params.push("body=" + encodeURIComponent(channelEntry.body || ""));
                        if (params.length > 0) {
                            mailtoLink += "?" + params.join("&");
                        }
                        channelDetails.link = mailtoLink;
                    }
                    channelDetails.windowThemeColor = channelEntry.windowThemeColor || "#007bff";
                    channelDetails.contentTitle = channelEntry.contentTitle || "";
                    channelDetails.contentSubtitle = channelEntry.contentSubtitle || "";
                    channelDetails.headerTitle = channelEntry.headerTitle || "";
                    channelDetails.id = EMAILBUBBLE_ID;
                    break;

                default:
                    channelDetails.render = false;
                    break;
            }
        }

        return channelDetails;
    }

    function getBase4EncodedUrl(url) {
        let base4Encoded = "";

        for (var i = 0; i < url.length; i++) {
            let base4Bits = url.charCodeAt(i).toString(4);
            base4Bits = base4Bits.padStart(4, "0");
            for (var j = 0; j < base4Bits.length; j++) {
                switch (base4Bits.charAt(j)) {
                    case '0':
                        base4Encoded += "%e2%80%8b";
                        break;
                    case '1':
                        base4Encoded += "%e2%80%8c";
                        break;
                    case '2':
                        base4Encoded += "%e2%80%8d";
                        break;
                    default:
                        base4Encoded += "%e2%80%8e";
                        break;
                }
            }
        }
        return base4Encoded;
    }

    function removeAllChildNodes(parent) {
        while (parent.firstChild) {
            parent.removeChild(parent.firstChild);
        }
    }

    var isWebStorageAvailable = testSessionStorage();

    /**
     * Test whether Session Storage is available and turned on
     */
    function testSessionStorage() {
        var test = '__feature_test';
        try {
            window.sessionStorage.setItem(test, test);
            window.sessionStorage.removeItem(test);
            return true;
        } catch (e) {
            return false;
        }
    }

    function getDataAttributesFromBotLoaderScript() {
        const dataAttributes = {};

        var botLoaderScriptElement = Array.from(document.scripts).find(
            (script) => script.src.indexOf("bot-loader.js") > -1
        );

        // Iterate over all attributes of the element
        for (let i = 0; i < botLoaderScriptElement.attributes.length; i++) {
            const attr = botLoaderScriptElement.attributes[i];

            // Check if the attribute starts with 'data-'
            if (attr.name.startsWith('data-')) {
                const key = attr.name;  // Remove 'data-' from the key
                const value = attr.value;
                dataAttributes[key] = value;
            }
        }

        return dataAttributes;
    }

    /**
     * Create a iframe for the chat window with the given url 
     * @param {string} iframeSrc 
     * @param {boolean} preventIframeRender
     * @param {string} position
     * @param {boolean} testMode Load chatbot in test mode 
     */
    function createChatWindow(iframeSrc, botType, deviceSettings, preventIframeRender, positionClass, testMode = true, setUserDataForBot = "false", hideChatHistory = false, enablePortal = false, enableHomePortal = false, enableMessagePortal = false, forms = "", enableMessageFeedback = false) {

        let container = document.createElement("div");
        let iframe = document.createElement("iframe");
        let poweredByContainer = document.createElement("div");
        let poweredBySpan = document.createElement("span");

        container.setAttribute("id", kenytChatWindowContainerId);
        container.classList.add("k-hide");
        //container.style.display = "none";

        let hash = getHash(scriptElement.outerHTML);

        let parentUrl = origin;
        if (isWebStorageAvailable) {
            let kenytSession = window.localStorage.getItem("__kenytsession__");
            if (kenytSession) {
                kenytSession = JSON.parse(kenytSession);
            }

            if (kenytSession && kenytSession.FirstPageQueryPrm) {
                var index = parentUrl.indexOf("?");
                if (index > 0) {
                    var firstPageParams = new URLSearchParams(kenytSession.FirstPageQueryPrm);
                    var firstPageParamsObj = Object.fromEntries(firstPageParams.entries());
                    var currentPageParams = new URLSearchParams(parentUrl.substring(index));
                    var currentPageParamsObj = Object.fromEntries(currentPageParams.entries());

                    // Prioritizing params from current page.
                    for (var attrname in currentPageParamsObj) { firstPageParamsObj[attrname] = currentPageParamsObj[attrname]; }
                    var queryString = Object.keys(firstPageParamsObj).map(key => key + '=' + firstPageParamsObj[key]).join('&');

                    parentUrl = parentUrl.substring(0, index) + "?" + queryString;
                }
                else {
                    parentUrl += "?" + kenytSession.FirstPageQueryPrm;
                }
            }
        }

        // Parse the URL and extract the "kenytStartIntent" query parameter
        const urlObj = new URL(window.parent.location.href);
        let kenytStartIntent = urlObj.searchParams.get('kenytStartIntent');

        parentUrl = encodeURIComponent(parentUrl);
        let srcUrl = `${rootUrl}${iframeSrc}&botid=${botName}&origin=${parentUrl}&enablePortal=${enablePortal}&enableHomePortal=${enableHomePortal}&enableMessagePortal=${enableMessagePortal}&test=${!testMode ? 0 : 1}&hash=${hash}&setuserdataforbot=${setUserDataForBot}&hideChatHistory=${hideChatHistory}&enableMessageFeedback=${enableMessageFeedback}&forms=${forms}&kenytStartIntent=${kenytStartIntent}`;
        const botLoaderScriptDataAttributes = getDataAttributesFromBotLoaderScript();

        for (const [key, value] of Object.entries(botLoaderScriptDataAttributes)) {
            srcUrl += `&${key}=${value}`;
        }

        for (var i = 0, atts = scriptElement.attributes, n = atts.length; i < n; i++) {
            var attributeName = atts[i].nodeName;
            if (attributeName.startsWith("context-")) {
                let encodedVal = encodeURIComponent(atts[i].nodeValue);
                srcUrl += `&${attributeName}=${encodedVal}`;
            }
            else if (attributeName.startsWith("user-")) {
                let encodedVal = encodeURIComponent(atts[i].nodeValue);
                srcUrl += `&${attributeName}=${encodedVal}`;
            }
        }

        iframe.setAttribute("src_to_set", srcUrl);
        iframe.setAttribute("id", IFRAME_ID);
        iframe.setAttribute("title", "AI Agent conversation window");
        iframe.setAttribute("allow", "geolocation; microphone; camera");
        iframe.allowFullscreen = "allowFullscreen"; // for youtube embeds

        if (botType) {
            container.classList.add(botType);
        }

        if (deviceSettings) {
            var device = isMobileDevice() ? "mobile" : "desktop";
            if (deviceSettings[device]) {
                if (deviceSettings[device]["open Height"]) {
                    container.style.height = deviceSettings[device]["open Height"];
                }
                if (deviceSettings[device]["open Width"]) {
                    container.style.width = deviceSettings[device]["open Width"];
                }
            }
        }

        poweredBySpan.innerHTML = `Powered By <a href="https://www.kenyt.ai" tabindex="-1">Kenyt.AI</a>`;
        poweredByContainer.appendChild(poweredBySpan);
        poweredByContainer.id = 'kenytPoweredBy';

        if (!preventIframeRender) {
            container.appendChild(iframe);
        }
        container.classList.add(positionClass);
        container.appendChild(poweredByContainer);
        return container;
    }

    /**
     * Get value of the script parameter
     * @param {string} paramName
     * 
     * @returns {string} param value corresponding to the param name
     */
    function getScriptParam(paramName) {
        let paramValue = '';
        if (scriptElement) {
            let attribute = `${paramName}`;
            if (scriptElement.hasAttribute(attribute)) {
                paramValue = scriptElement.getAttribute(attribute);
            }
        }
        return paramValue;
    }

    /**
     * Get the API endpoint based on the current environment
     * 
     * @returns {string} The API Endpoint
     */
    function detectEndPoint() {

        if (rootUrl.indexOf("localhost") >= 0) {
            var endpoint = `${rootUrl}${ENDPOINT}`;
            //console.debug('Endpoint set to ' + endpoint);
            return endpoint;
        }
        else if (rootUrl.indexOf("ngrok-free.app") > 0) {
            var endPoint = "https://" + window.location.hostname + `${PROD_PREFIX}${ENDPOINT}`;
            //console.debug('Endpoint set to ngrok url ' + endPoint);
            return endPoint;
        }
        else {
            let endpoint = `${rootUrl}${PROD_PREFIX}${ENDPOINT}`
            //console.debug('Endpoint set to ' + endpoint);
            return endpoint;
        }
    }

    function extractRootUrl() {
        /** @type {string} */
        let source = getScriptParam('src');
        let rootUrl = "";
        if (source) {
            if (source.startsWith("//www.")) {
                source = "https:" + source;
            }
            else if (source.startsWith(".") || source.startsWith("/")) {
                source = window.location.protocol + "//" + window.location.hostname;
                if (window.location.port) {
                    source += `:${window.location.port}`;
                }
            }
            let url = new URL(source);
            rootUrl = url.protocol + "//" + url.hostname;
            if (url.port) {
                rootUrl += `:${url.port}`;
            }
        }
        //console.debug('Root URL: ' + rootUrl);
        return rootUrl;
    }

    /**
     * Get the CSS class corresponding to the provided position string
     * @param {string} position 
     * 
     * @returns {string} The CSS class representing the position
     */
    function getPositionClass(position) {
        if (position && typeof position === 'string') {
            position = position.trim().toLowerCase();
            if (position) {
                let keys = Object.keys(positionClasses);
                for (let i = 0; i < keys.length; i++) {
                    if (keys[i] === position) {
                        return positionClasses[keys[i]];
                    }
                }
            }
        }
        return positionClasses.right; // DEFAULT
    }

    function isMobileDevice() {
        return navigator.userAgent.match(/Android/i)
            || navigator.userAgent.match(/webOS/i)
            || navigator.userAgent.match(/iPhone/i)
            || navigator.userAgent.match(/iPad/i)
            || navigator.userAgent.match(/iPod/i)
            || navigator.userAgent.match(/BlackBerry/i)
            || navigator.userAgent.match(/Windows Phone/i);
    }

    function getMobileOperatingSystem() {
        var userAgent = navigator.userAgent || window.opera;

        // Windows Phone must come first because its UA also contains "Android"
        if (/windows phone/i.test(userAgent)) {
            return "Windows Phone";
        }

        if (/android/i.test(userAgent)) {
            return "Android";
        }

        // iOS detection from: http://stackoverflow.com/a/9039885/177710
        if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
            return "iOS";
        }

        return "unknown";
    }

    function kenyt_gtag() { dataLayer.push(arguments); }

    function getHash(text) {
        var hash = 0, i, chr;
        for (i = 0; i < text.length; i++) {
            chr = text.charCodeAt(i);
            hash = ((hash << 5) - hash) + chr;
            hash |= 0; // Convert to 32bit integer
        }
        return hash;
    }

    /**
    * Get HTML string as a DOM element
    * @param {String} HTML representing a single element
    * @return {Element}
    */
    function htmlToElement(html) {
        html = html.trim();
        var template = document.createElement('template');
        template.innerHTML = html;
        return template.content.firstChild;
    }

    function getUnreadMessageCount() {
        var count = kenytChatBubble.element.getAttribute(unreadCountAttribute);
        if (count) {
            count = parseInt(count);
        }
        if (!count) {
            count = 0
        }

        return count;
    }

    function setUnreadMessageCount(value) {
        if (value === 0) {
            clearUnreadMessages();
        }
        else {
            kenytChatBubble.element.setAttribute(unreadCountAttribute, value);
            saveSessionData(UNREAD_COUNT_SESSION_KEY, `${value}`);
        }
    }

    function clearUnreadMessages() {
        unreadMessageCount = 0;
        if (kenytChatBubble.element.hasAttribute(unreadCountAttribute)) {
            kenytChatBubble.element.removeAttribute(unreadCountAttribute);
        }
        saveSessionData(UNREAD_COUNT_SESSION_KEY, `${unreadMessageCount}`);
    }
    /**
     * Save key/value pair in browser's session storage if available
     * @param {string} key
     * @param {string} value
     */
    function saveSessionData(key, value) {
        if (isWebStorageAvailable) {
            window.sessionStorage.setItem(key, value);
        }
    }

    async function saveFirebaseToken() {
        if (firebaseAppConfig) {
            let firebaseApp = await import("https://www.gstatic.com/firebasejs/10.12.0/firebase-app-compat.js");
            let firebaseMessenger = await import("https://www.gstatic.com/firebasejs/10.12.0/firebase-messaging-compat.js");
            if (firebaseApp && firebaseMessenger) {
                firebase.initializeApp(firebaseAppConfig);
                const firebaseMessaging = firebase.messaging();

                Notification.requestPermission().then((permission) => {
                    if (permission === "granted") {
                        navigator.serviceWorker.register('/kenyt-fcm-sw.js').then((registration => {
                            firebaseMessaging
                                .getToken({
                                    vapidKey: "BLKlFVj0v-DBhimtDYEHJRgLilz6fUC8pPkrwtdyHEQLsDQylDaL6qITIa3VM3Yprw8AKyGa1MNaAyhEApoPUwQ",
                                    serviceWorkerRegistration: registration
                                })
                                .then((currentToken) => {
                                    if (currentToken) {
                                        if (kenytChatBubbleJs && kenytChatBubbleJs.notifyChatWindow) {
                                            kenytChatBubbleJs.notifyChatWindow(iframeEventType.FirebaseToken, currentToken);
                                        }
                                    }
                                })
                        }))
                    }
                });

                firebaseMessaging.onMessage((payload) => {
                    const notification = payload.notification;
                    const notificationTitle = notification?.title;
                    const notificationOptions = {
                        body: notification?.body,
                        icon: notification?.icon
                    };

                    new Notification(notificationTitle, notificationOptions);
                });
            }
        }
    }

    /**
     * Open WhatsApp window using postMessage
     */
    function openWhatsAppWindow() {
        // Get the iframe
        let iframe = document.getElementById(IFRAME_ID);
        
        if (!iframe) {
            console.log('Iframe not found');
            return;
        }

        // Get WhatsApp channel details
        let whatsappChannelDetails = null;
        if (channelConfig && channelConfig.channels) {
            const whatsappChannel = channelConfig.channels.find(channel => channel.type === CHANNEL_TYPE_WHATSAPP);
            console.log('WhatsApp channel found:', whatsappChannel);
            if (whatsappChannel) {
                whatsappChannelDetails = getChannelDetails(whatsappChannel, "");
                console.log('WhatsApp channel details:', whatsappChannelDetails);
            }
        } else {
            console.log('No WhatsApp channel config found. channelConfig:', channelConfig);
        }

        // Send message to iframe to open WhatsApp window
        iframe.contentWindow.postMessage({
            type: 'openWhatsAppWindow',
            action: 'create',
            channelDetails: whatsappChannelDetails
        }, '*');

        // Show the chat container and hide the chat bubble
        const chatContainer = document.getElementById(kenytChatWindowContainerId);
        if (chatContainer) {
            chatContainer.classList.remove('k-hide');
            chatContainer.style.display = 'block';
        }
        
        // Hide the chat bubble (same logic as regular chat window)
        const chatBubble = document.getElementById(CHATBUBBLE_ID);
        if (chatBubble) {
            chatBubble.classList.add('k-hide');
        }
    }

    /**
     * Close WhatsApp window using postMessage
     */
    function closeWhatsAppWindow() {
        // Get the iframe
        let iframe = document.getElementById(IFRAME_ID);
        
        if (iframe) {
            // Send message to iframe to close WhatsApp window
            iframe.contentWindow.postMessage({
                type: 'closeWhatsAppWindow',
                action: 'close'
            }, '*');
        }

        // Hide the chat container and show the chat bubble
        const chatContainer = document.getElementById(kenytChatWindowContainerId);
        if (chatContainer) {
            chatContainer.classList.add('k-hide');
        }
        
        // Show the chat bubble again (same logic as regular chat window)
        const chatBubble = document.getElementById(CHATBUBBLE_ID);
        if (chatBubble) {
            chatBubble.classList.remove('k-hide');
        }
    }

    /**
     * Send WhatsApp message
     */
    function sendWhatsAppMessage() {
        // Get iframe document
        let iframe = document.getElementById(IFRAME_ID);
        let iframeDoc = iframe ? iframe.contentDocument || iframe.contentWindow.document : null;
        
        const input = iframeDoc ? iframeDoc.getElementById('whatsappInput') : null;
        const messagesContainer = whatsappWindow ? whatsappWindow.querySelector('div[style*="flex: 1"]') : null;
        
        if (input && input.value.trim() && messagesContainer && iframeDoc) {
            const messageDiv = iframeDoc.createElement('div');
            messageDiv.style.cssText = `
                background: #dcf8c6;
                padding: 10px 15px;
                border-radius: 18px;
                margin-bottom: 15px;
                max-width: 80%;
                margin-left: auto;
                margin-right: 0;
            `;
            messageDiv.textContent = input.value;
            
            messagesContainer.appendChild(messageDiv);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
            
            // Clear input and reset height
            input.value = '';
            input.style.height = '35px';
            
            // Simulate response
            setTimeout(() => {
                const responseDiv = iframeDoc.createElement('div');
                responseDiv.style.cssText = `
                    background: white;
                    padding: 10px 15px;
                    border-radius: 18px;
                    margin-bottom: 15px;
                    max-width: 80%;
                `;
                responseDiv.textContent = 'Thank you for your message! Our support team will get back to you soon.';
                messagesContainer.appendChild(responseDiv);
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
            }, 1000);
        }
    }

    /**
     * Handle Enter key press in WhatsApp textarea
     */
    function handleWhatsAppKeyPress(event) {
        if (event.key === 'Enter' && !event.shiftKey) {
            event.preventDefault();
            sendWhatsAppMessage();
        }
    }

    /**
     * Open WhatsApp URL from parent window (avoiding popup blocker)
     */
    function openWhatsAppUrl(url) {
        if (url) {
            console.log('Opening WhatsApp URL:', url);
            window.open(url, '_blank');
        } else {
            console.error('No WhatsApp URL provided');
        }
    }


    /**
     * Open email window using postMessage
     */
    function openEmailWindow() {
        // Get the iframe
        let iframe = document.getElementById(IFRAME_ID);
        
        if (!iframe) {
            console.log('Iframe not found');
            return;
        }

        // Get email channel details from channelConfig
        let emailChannelDetails = null;
        if (channelConfig && channelConfig.channels) {
            const emailChannel = channelConfig.channels.find(channel => channel.type === CHANNEL_TYPE_EMAIL);
            if (emailChannel) {
                emailChannelDetails = getChannelDetails(emailChannel, "");
            }
        }

        // Send message to iframe to open email window
        iframe.contentWindow.postMessage({
            type: 'openEmailWindow',
            action: 'create',
            channelDetails: emailChannelDetails
        }, '*');

        // Show the chat container and hide the chat bubble
        const chatContainer = document.getElementById(kenytChatWindowContainerId);
        if (chatContainer) {
            chatContainer.classList.remove('k-hide');
            chatContainer.style.display = 'block';
        }
        
        // Hide the chat bubble (same logic as regular chat window)
        const chatBubble = document.getElementById(CHATBUBBLE_ID);
        if (chatBubble) {
            chatBubble.classList.add('k-hide');
        }
    }

    /**
     * Open phone window using postMessage
     */
    function openPhoneWindow() {
        // Get the iframe
        let iframe = document.getElementById(IFRAME_ID);
        
        if (!iframe) {
            console.log('Iframe not found');
            return;
        }

        // Get phone channel details from channelConfig
        let phoneChannelDetails = null;
        if (channelConfig && channelConfig.channels) {
            const phoneChannel = channelConfig.channels.find(channel => channel.type === CHANNEL_TYPE_PHONE);
            if (phoneChannel) {
                phoneChannelDetails = getChannelDetails(phoneChannel, "");
            }
        }

        // Send message to iframe to open phone window
        iframe.contentWindow.postMessage({
            type: 'openPhoneWindow',
            action: 'create',
            channelDetails: phoneChannelDetails
        }, '*');

        // Show the chat container and hide the chat bubble
        const chatContainer = document.getElementById(kenytChatWindowContainerId);
        if (chatContainer) {
            chatContainer.classList.remove('k-hide');
            chatContainer.style.display = 'block';
        }
        
        // Hide the chat bubble (same logic as regular chat window)
        const chatBubble = document.getElementById(CHATBUBBLE_ID);
        if (chatBubble) {
            chatBubble.classList.add('k-hide');
        }
    }

    /**
     * Close email window using postMessage
     */
    function closeEmailWindow() {
        // Get the iframe
        let iframe = document.getElementById(IFRAME_ID);
        
        if (iframe) {
            // Send message to iframe to close email window
            iframe.contentWindow.postMessage({
                type: 'closeEmailWindow',
                action: 'close'
            }, '*');
        }

        // Hide the chat container and show the chat bubble
        const chatContainer = document.getElementById(kenytChatWindowContainerId);
        if (chatContainer) {
            chatContainer.classList.add('k-hide');
        }
        
        // Show the chat bubble again (same logic as regular chat window)
        const chatBubble = document.getElementById(CHATBUBBLE_ID);
        if (chatBubble) {
            chatBubble.classList.remove('k-hide');
        }
    }

    /**
     * Close phone window using postMessage
     */
    function closePhoneWindow() {
        // Get the iframe
        let iframe = document.getElementById(IFRAME_ID);
        
        if (iframe) {
            // Send message to iframe to close phone window
            iframe.contentWindow.postMessage({
                type: 'closePhoneWindow',
                action: 'close'
            }, '*');
        }

        // Hide the chat container and show the chat bubble
        const chatContainer = document.getElementById(kenytChatWindowContainerId);
        if (chatContainer) {
            chatContainer.classList.add('k-hide');
        }
        
        // Show the chat bubble again (same logic as regular chat window)
        const chatBubble = document.getElementById(CHATBUBBLE_ID);
        if (chatBubble) {
            chatBubble.classList.remove('k-hide');
        }
    }

    // Expose functions to global scope
    window.closeWhatsAppWindow = closeWhatsAppWindow;
    window.sendWhatsAppMessage = sendWhatsAppMessage;
    window.handleWhatsAppKeyPress = handleWhatsAppKeyPress;
    window.openEmailWindow = openEmailWindow;
    window.closeEmailWindow = closeEmailWindow;
    window.openPhoneWindow = openPhoneWindow;
    window.closePhoneWindow = closePhoneWindow;
})();