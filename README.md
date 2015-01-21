# HyxServer
> The node.js Server of Hyx App by Hw.Tech.Ltd

**云函数列表**

* registerUser （用户注册）
* getTwowayFriends （获取双向好友） 
* getToconfirmFriends （获取好友请求）


**页面列表**

* 会议发布页面
* 会议展示页面
* 发送推送消息
* 用户资料编辑 


**常用功能函数**

> 请移步  [publicApi](https://github.com/plusmancn/publicApi)，由 ThinkPhp 强力驱动的开放saas化的基础服务平台

**Bug血泪史**

* 关于local，develop，production 三个生产环境的故事

****

[TOC]


****

## 页面列表
### 会议发布页面
**接口地址**    
http://dev.juyx.avosapps.com/MeetingEdit?meetingId=%@&userId=%@

**请求方式**  
`Get`

**参数定义**

| 参数		| 解释		
|:----------|:-----------
| meetingId | 为0时候，则为新建会议，相应会议objectId时候则为编辑会议|
| userId	| 创建者用户ID，meetingId为0时候，必须带上

****
###  会议展示页面 
**接口地址**
http://dev.juyx.avosapps.com/MeetingShow?meetingId=%@

**请求方式**
`Get`

**参数定义**

| 参数      |     解释 
| :-------- | :--------
| meetingId   |  会议objectId 

****
###  发送推送消息
**接口地址**
http://dev.juyx.avosapps.com/MessagePush?meetingId=%@

**请求方式**
`Get`

**参数定义**

| 参数      |     解释 
| :-------- | :--------
| meetingId   |  会议objectId 

****
###  用户资料编辑
**接口地址**
http://dev.juyx.avosapps.com/UserEdit?userId=%@

**请求方式**
`Get`

**参数定义**

| 参数      |     解释 
| :-------- | :--------
| userId    |  用户objectId 

****

## Bug血泪史
### 关于local，develop，production 三个生产环境的故事
工单
[{ code: 142, message: 'Cloud Code validation failed. Error detail : Class or object doesn\'t exists.' }](https://ticket.avosapps.com/tickets/54bd0f47e4b0b26e92db53f0/threads)

对于新手来说，leancloud的这三个环境确实是个坑，三个环境的代码，除了local是对用户透明的外，其他两个环境得靠自己记忆了。所以有时候，看本地代码，实在看不出bug在哪里的时候，可以尝试进行如下操作
	
	avoscloud deploy
	avoscloud publish
	
还是那种感觉，调bug，尽量避免黑盒。
