该项目为使用ThinkPHP5.1+X-Admin做的一个登录框架（数据库文件在app\common下有一个X-adminlogin.sql的数据库文件）
===============

ThinkPHP5.1对底层架构做了进一步的改进，减少依赖，其主要特性包括：

 + 采用容器统一管理对象
 + 支持Facade
 + 配置和路由目录独立
 + 取消系统常量
 + 助手函数增强
 + 类库别名机制
 + 增加条件查询
 + 改进查询机制
 + 配置采用二级
 + 依赖注入完善


> ThinkPHP5的运行环境要求PHP5.6以上。


## 目录结构
### 在app\admin或者app\index中的config目录中，创建了admin_url地址，有些公司在没有做静态化处理一个一个去修改文件路径属实有点憨憨。
### 所以现在只需要去修改对应的配置文件就可以了
初始的目录结构如下：

~~~
www  WEB部署目录（或者子目录）
├─application           应用目录
│  ├─common             公共模块目录（我将MySQL放在了该目录下也就是Model层）
│  ├─module_name        模块目录
│  │  ├─common.php      模块函数文件 
│  │  ├─controller      控制器目录
│  │  ├─model           模型目录  (注意，该木椅我已经去掉了，放在了公共目录中了)
│  │  ├─view            视图目录
│  │  └─ ...            更多类库目录
│  │
│  ├─command.php        命令行定义文件
│  ├─common.php         公共函数文件 (为了方便与前端调用，做一个一个简单的封装appApi方法)
│  └─tags.php           应用行为扩展定义文件
│
├─config                应用配置目录
│  ├─module_name        模块配置目录
│  │  ├─database.php    数据库配置
│  │  ├─cache           缓存配置
│  │  └─ ...            
│  │
│  ├─app.php            应用配置
│  ├─cache.php          缓存配置
│  ├─cookie.php         Cookie配置
│  ├─database.php       数据库配置
│  ├─log.php            日志配置
│  ├─session.php        Session配置
│  ├─template.php       模板引擎配置
│  └─trace.php          Trace配置
│
├─route                 路由定义目录
│  ├─route.php          路由定义
│  └─...                更多
│
├─public                WEB目录（对外访问目录）
│  ├─index.php          入口文件
│  ├─router.php         快速测试文件
│  └─.htaccess          用于apache的重写
│

~~~

## 命名规范

`ThinkPHP5`遵循PSR-2命名规范和PSR-4自动加载规范，并且注意如下规范：

### 目录和文件

*   目录不强制规范，驼峰和小写+下划线模式均支持；
*   类库、函数文件统一以`.php`为后缀；
*   类的文件名均以命名空间定义，并且命名空间的路径和类库文件所在路径一致；
*   类名和类文件名保持一致，统一采用驼峰法命名（首字母大写）；

### 函数和类、属性命名
*   类的命名采用驼峰法，并且首字母大写，例如 `User`、`UserType`，默认不需要添加后缀，例如`UserController`应该直接命名为`User`；
*   函数的命名使用小写字母和下划线（小写字母开头）的方式，例如 `get_client_ip`；
*   方法的命名使用驼峰法，并且首字母小写，例如 `getUserName`；
*   属性的命名使用驼峰法，并且首字母小写，例如 `tableName`、`instance`；
*   以双下划线“__”打头的函数或方法作为魔法方法，例如 `__call` 和 `__autoload`；

### 常量和配置
*   常量以大写字母和下划线命名，例如 `APP_PATH`和 `THINK_PATH`；
*   配置参数以小写字母和下划线命名，例如 `url_route_on` 和`url_convert`；

### 登陆界面效果图
![登陆界面效果图](https://raw.githubusercontent.com/jackzhaoyu/Login/master/image/login.png)

### 成功页面的跳转效果
![登陆界面效果图](https://github.com/jackzhaoyu/Login/blob/master/image/Loginsuccess.png)

### 跳转的首页！！！这里的页面全是假的，会后续更新
![首页效果图](https://raw.githubusercontent.com/jackzhaoyu/Login/master/image/jiayemian.jpg)

### 页面报错效果图
![首页效果图](https://raw.githubusercontent.com/jackzhaoyu/Login/master/image/eoor.png)
![首页效果图](https://raw.githubusercontent.com/jackzhaoyu/Login/master/image/loginerror.jpg)
