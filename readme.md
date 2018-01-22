# Lumen PHP API Kit

### 开发配置
1. git clone项目到本地开发环境。配置nginx或者apache环境。
2. cp复制一份.env.example 到根目录，重命名为：.env
3. 修改.env中的数据库配置信息，APP_KEY需要添加一个32位的随机字符串，具体可以在其他laravel项目中使用 php artisan key:generate生成。
4. 执行 composer install 安装第三方类库包。
5. 执行php artisan jwt:secret 命令生成jwt的secret
