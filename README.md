[contributors-shield]: https://img.shields.io/github/contributors/hassan7303/LSCacheAutoPreload.svg?style=for-the-badge
[contributors-url]: https://github.com/hassan7303/LSCacheAutoPreload/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/hassan7303/LSCacheAutoPreload.svg?style=for-the-badge&label=Fork
[forks-url]: https://github.com/hassan7303/LSCacheAutoPreload/network/members
[stars-shield]: https://img.shields.io/github/stars/hassan7303/LSCacheAutoPreload.svg?style=for-the-badge
[stars-url]: https://github.com/hassan7303/LSCacheAutoPreload/stargazers
[license-shield]: https://img.shields.io/github/license/hassan7303/LSCacheAutoPreload.svg?style=for-the-badge
[license-url]: https://github.com/hassan7303/LSCacheAutoPreload/blob/master/LICENSE
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-blue.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://www.linkedin.com/in/hassan-ali-askari-280bb530a/
[telegram-shield]: https://img.shields.io/badge/-Telegram-blue.svg?style=for-the-badge&logo=telegram&colorB=555
[telegram-url]: https://t.me/hassan7303
[instagram-shield]: https://img.shields.io/badge/-Instagram-red.svg?style=for-the-badge&logo=instagram&colorB=555
[instagram-url]: https://www.instagram.com/hasan_ali_askari
[github-shield]: https://img.shields.io/badge/-GitHub-black.svg?style=for-the-badge&logo=github&colorB=555
[github-url]: https://github.com/hassan7303
[email-shield]: https://img.shields.io/badge/-Email-orange.svg?style=for-the-badge&logo=gmail&colorB=555
[email-url]: mailto:hassanali7303@gmail.com

[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]
[![Telegram][telegram-shield]][telegram-url]
[![Instagram][instagram-shield]][instagram-url]
[![GitHub][github-shield]][github-url]
[![Email][email-shield]][email-url]

# LSCache Auto Preload

**Version:** 1.2.0  
**Author:** hassan ali askari  

---

## Overview

This plugin is designed to **automatically preload pages after LiteSpeed cache purge**.  
Its main purpose is to ensure fast and ready cache for users immediately after the cache is cleared.

---

## Features

- Automatically preloads the **homepage** after cache purge.
- Preloads important static pages:  
  - Shop (`/shop/`)  
  - About Us (`/about-us/`)  
  - Contact Us (`/contact-us/`)  
  - Blog (`/blog/`)
- Preloads **all published posts**.
- If a post is a **product** (`product` post type), the **shop page** is also preloaded.
- Requests are executed **asynchronously (non-blocking)** to avoid affecting site performance.
- **Desktop requests are sent twice** to ensure full cache build.
- **Mobile devices** including iPhone, Android, and generic phones are preloaded as well.
- Simple logging in WordPress `error_log` for preload status tracking.

---

## Installation & Setup

1. Place the plugin folder in `/wp-content/plugins/`.
2. Activate the plugin from the WordPress admin panel.
3. The plugin will automatically preload specified pages after cache purge.

---

## How It Works

- **Single post or link cache purge:**  
  The plugin preloads the specific link + the homepage.  
  If the post type is a product, the shop page is also preloaded.

- **Full cache purge (`purge all`):**  
  The plugin preloads in order:
  1. Homepage
  2. Important static pages
  3. All published posts

---

## Notes

- The plugin uses a **separate `run_preload.php` script** to execute async requests.
- **Non-existent pages (404)** are logged in `error_log`.
- No cron jobs or server changes are required.
- The plugin preserves the **existing async structure** without affecting site functionality.

---

## Developer

Developed by **hassan ali askari**.



# LSCache Auto Preload

**نسخه:** 1.0.0  
**نویسنده:** hassan ali askari  

---

## توضیح کلی

این افزونه برای **پیش‌بارگذاری (preload) صفحات بعد از پاک شدن کش LiteSpeed** طراحی شده است.  
هدف اصلی این افزونه ساخت کش سریع و بدون تأخیر برای کاربران بعد از پاک شدن کش است.

---

## ویژگی‌ها

- پیش‌بارگذاری خودکار **صفحه اصلی** بعد از پاک شدن کش.
- پیش‌بارگذاری **صفحات مهم ثابت**:  
  - فروشگاه (`/shop/`)  
  - درباره ما (`/about-us/`)  
  - تماس با ما (`/contact-us/`)  
  - بلاگ (`/blog/`)
- پیش‌بارگذاری **تمام پست‌ها** منتشر شده.
- اگر پست از نوع محصول باشد (`product`)، **صفحه فروشگاه** نیز پیش‌بارگذاری می‌شود.
- درخواست‌ها به صورت **غیرهمزمان (async)** اجرا می‌شوند تا تأثیری روی عملکرد سایت نداشته باشند.
- **دسکتاپ دو بار** request زده می‌شود تا کش کامل ساخته شود.
- **موبایل‌ها** شامل iPhone، Android و گوشی‌های معمولی هم پیش‌بارگذاری می‌شوند.
- لاگ ساده در `error_log` وردپرس برای بررسی وضعیت preload.

---

## نصب و راه‌اندازی

1. فایل پلاگین را داخل مسیر `/wp-content/plugins/` قرار دهید.
2. از پیشخوان وردپرس، افزونه را فعال کنید.
3. افزونه به صورت خودکار بعد از پاک شدن کش، صفحات مشخص شده را پیش‌بارگذاری می‌کند.

---

## نحوه عملکرد

- **پاک شدن کش یک لینک یا پست:**  
  افزونه لینک مربوطه + صفحه اصلی را پیش‌بارگذاری می‌کند.  
  اگر پست نوع محصول باشد، صفحه فروشگاه هم preload می‌شود.

- **پاک شدن کل کش (`purge all`):**  
  افزونه به ترتیب:
  1. صفحه اصلی
  2. صفحات مهم ثابت
  3. تمام پست‌ها
  را پیش‌بارگذاری می‌کند.

---

## نکات

- پلاگین از **اسکریپت خارجی `run_preload.php`** برای اجرای درخواست‌های غیرهمزمان استفاده می‌کند.
- **صفحات غیرموجود (404)** نیز در `error_log` ثبت می‌شوند.
- بدون نیاز به کرون یا تغییرات دیگر در سرور.
- افزونه با ساختار استاندارد async بدون تغییر در عملکرد سایت طراحی شده است.

---

## توسعه‌دهنده

این افزونه توسط **hassan ali askari** توسعه داده شده است.

