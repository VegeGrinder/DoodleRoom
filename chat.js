// WARNING: PUBNUB KEYS REQUIRED FOR EXAMPLE TO FUNCTION
const PUBLISH_KEY = 'pub-c-579b27cb-a54d-4a3d-b9c9-b8b0db92d14f';
const SUBSCRIBE_KEY = 'sub-c-5ba100a0-ff46-11e8-b528-9e80330262eb';

// just making sure you're paying attention
if (PUBLISH_KEY === '' || SUBSCRIBE_KEY === '') {
  alert('You forgot to enter your keys');
}

let ChatEngine = ChatEngineCore.create({
  publishKey: PUBLISH_KEY,
  subscribeKey: SUBSCRIBE_KEY
});

const getUsername = () => {
  const animals = ['zebra', 'goat', 'cow', 'pig', 'tiger', 'wolf', 'pony', 'antelope'];
  return animals[Math.floor(Math.random() * animals.length)];
};

// let peopleTemplate = Handlebars.compile($("#person-template").html());

const appendMessage = (username, text) => {

  let message =
    $(`<li class="list-group-item" />`)
      .append($('<strong>').text(username + ': '))
      .append($('<span>').text(text));

  $('#log').append(message);
  $("#chat-box").animate({ scrollTop: $('#log').prop("scrollHeight") }, "slow");
};

let me = ChatEngine.connect(nickname,{
  image: imageId
});

ChatEngine.on('$.ready', (data) => {

  let me = data.me;

  let chat = new ChatEngine.Chat(channelId);//chat-engine-server

  chat.on('$.connected', (payload) => {
    appendMessage(me.uuid, 'Connected to chat!');
  });

  chat.on('$.online.here', (payload) => {
    appendMessage('Status', payload.user.uuid + ' is in the channel!');
  });

  chat.on('$.online.join', (payload) => {
    appendMessage('Status', payload.user.uuid + ' has come online!');
  });

  chat.on('message', (payload) => {
    appendMessage(payload.sender.uuid, payload.data.text);
  });

  chat.on('$.disconnected', (payload) => {
    appendMessage('User left the room:', payload.user);
  });

  $("#message").keypress(function (event) {
    if (event.which == 13) {
      chat.emit('message', {
        text: $('#message').val()
      });
      $("#message").val('');
      event.preventDefault();
    }
  });

  chat.on('$.online.*', (data) => {
    $('#channels-list-text').append('<li id='+data.user.uuid+' style="color:grey">'+data.user.uuid+'<img src='+data.user.state.image+'style=""></img>'+'</li>');
    console.log(data);
  });

  // when a user goes offline, remove them from the online list
  chat.on('$.offline.*', (data) => {
    $('#'+data.user.uuid).remove();console.log(data.user.uuid);
  });

  // wait for our chat to connect
  chat.on('$.connected', () => {
    // search for 50 old message emits / publishes on the channel
    chat.search({
      reverse: true,
      event: 'message',
      limit: 5
    }).on('message', (data) => {
      // when messages are returned, log them like normal messages
      appendMessage(data.sender.uuid, data.data.text);
    });
  });
  console.log(chat.users);
});