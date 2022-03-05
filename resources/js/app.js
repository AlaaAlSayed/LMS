require('./bootstrap');
// window.Echo = new Echo({ broadcaster: "pusher", key: "YOUR_APP_KEY" });

window.Echo.private('private-chat')
  .listen('clientSendMessage', (e) => {
    this.messages.push({
    //   message: e.message.message,
      message: e.message,
      user_id: e.user_id,
      receiver_id:e,receiver_id
    });
  });