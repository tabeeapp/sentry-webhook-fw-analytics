## Crash Forwarding - Sentry.io to Adjust.com 

[![Tweet](https://img.shields.io/twitter/url/http/shields.io.svg?style=social)](https://twitter.com/intent/tweet?text=Send%20sentry%20crash%20events%20to%20your%20analytics&url=&hashtags=crash,analytics,events,mobile)&nbsp;[![Language](http://img.shields.io/badge/language-php-brightgreen.svg?style=flat)](https://php.net)&nbsp;
## Overview ##

PHP Crash Parser from Sentry to Mobile analytics, export data to Adjust.com

## Table of contents

* [Working with the Parser](#start)
   * [Prerequisite](#prerequisite)   
      * [Sentry Tags](#sentry-tags)
      * [Activate WebHooks](#sentry-hooks)
   * [Server Set Up](#set-up)
      * [Logging your results](#logs)
* [Licence](#licence)

## <a id="start"></a>Working with the Parser ##

### <a id="prerequisite"></a>Prerequisite ###

Before getting started with the set up make sure you run SaaS or On-Premise Sentry and Implement Sentry SDK with Tags.

-----

#### <a id="sentry-tags"></a>Sentry Tags ####

Integrate Sentry SDK and enrich your device level data with device_id's such as `idfa` / `idfv` or `user_id`. See details on Tags [here][sentry-tags].

Swift:
```swift
import Sentry

    SentrySDK.configureScope { scope in
        scope.setTag(value:sentry_idfa, key: "idfa")
        scope.setTag(value:sentry_idfv, key: "idfv")
    }
```

Objective-C:
```objc
@import Sentry;

    [SentrySDK configureScope:^(SentryScope * scope) {
        [scope setTagValue:sentry_idfa forKey:@"idfa" ];
        [scope setTagValue:sentry_idfv forKey:@"idfv"];
    }];
```

---

#### <a id="sentry-hooks"></a>Activate WebHooks ####

Activate your sentry WebHooks in Sentry Interface or by the link :
https://`{{url}}`/settings/`{{company_slug}}`/projects/`{{project_slug}}`/plugins/webhooks/

<img src="https://tabee.app/img/sentry_webhooks.png"  width="650">

Learn more on details about Sentry hooks format [here][sentry-hooks].

---

### <a id="set-up"></a>Server Set Up ###

Clone repository to PHP enabled server, e.g. to subfolder of your landing page and make sure it is available on web.

```
$ git clone https://github.com/tabeeapp/sentry-webhook-fw-analytics.git
```

Copy `modules/adjust-config-temp.php` and set up your credentials in newly created config.

```
$ cd modules
$ cp adjust-config-temp.php adjust-config.php
```

You are all set now.

---

#### <a id="logs"></a>Logging your results ####

To disable logs just set it so in `adjust-config.php`

```
define( 'LOG', false );
```

---

[Logs]:  logs/
[sentry-tags]:  https://docs.sentry.io/platforms/apple/guides/ios/enriching-events/tags/
[sentry-hooks]:  https://docs.sentry.io/product/integrations/integration-platform/webhooks/#issue-alerts


## <a id="licence"></a>Licence and Copyright ##

The php module is licensed under the MIT License.

Tabee Networking Limited (c) 2020 All Rights Reserved

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

[![Analytics](https://ga-beacon.appspot.com/UA-125243602-3/sentry-crash/README.md)](https://github.com/igrigorik/ga-beacon)
