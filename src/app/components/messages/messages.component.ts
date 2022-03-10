import { PusherService } from './../../services/pusher.service';
import { Component, OnInit } from '@angular/core';
interface Message {
  user_id: number;
  message: string;
}

@Component({
  selector: 'app-messages',
  templateUrl: './messages.component.html',
  styleUrls: ['./messages.component.css']
})
export class MessagesComponent implements OnInit {
  messages: Array<Message>;
  constructor(private pusherService: PusherService) { this.messages = [];}

  sendMessage(user_id: number, text: string) {
    const message: Message = {
      user_id: user_id,
      message: text,
    }
  }
  ngOnInit(): void {
    
    this.pusherService.messagesChannel.bind('clientSendMessage', (message:any) => {
      this.messages.push(message);
  });
}

}
