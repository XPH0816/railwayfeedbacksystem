# Railway Feedback System
## Prerequisite
- A Mailersend Account and remember your API key and domain given
- [Git](https://git-scm.com/downloads) Installed
- Laravel with Composer (PHP), Node.js (npm) and [pnpm](https://pnpm.io/installation) are installed

![image](https://github.com/user-attachments/assets/6650f0a2-9ce7-4423-b611-59869a151b04)

## How to setup
1. git clone the project link and open in vscode
```bash
git clone https://github.com/XPH0816/railwayfeedbacksystem.git
```
2. Install the Dependencies and build the node_modules
```bash
composer install 
```
```bash
pnpm install
pnpm build
```
3. Setup the enviroment 
```bash
composer run-script post-root-package-install
composer run-script post-create-project-cmd
```
4. Add your enviroment variables inside the your .env files
```bash
MAIL_MAILER=mailersend
#MAIL_HOST=smtp.gmail.com
#MAIL_PORT=587
#MAIL_USERNAME="your-email-address"
#MAIL_PASSWORD="your-app-passowrd-get-from-the-prerequiesite"
#MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="anything@domain-from-mailersend"
MAIL_FROM_NAME="${APP_NAME}"

MAILERSEND_API_KEY="your-api-key"
```
5. Run Migrations with seed 🌱
```bash
php artisan migrate:refresh --seed
```
6. Enjoy your system by running 2 command
```bash
php artisan serve
```
and (remember open 2 terminal)
```bash
php artisan queue:work
```

### Note: 
Admin login credential:
- email: ```admin@example.com```
- password: ```admin```
