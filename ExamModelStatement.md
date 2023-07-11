### 29.06.2023

**Theory exam (`10 minutes`)**: [Click here](https://forms.gle/78o6i6Y7b1izyaQ16).

**Practical exam (`3 hours`):**

You have to write a full stack application that people can use as an instant messenger.

Recall that each functionality is worth **1 snowflake**. Your snowflakes are then converted to **points**. 

Please implement **exactly** what is asked, **nothing more** and **nothing less**. You need to present the functionalities in the order that they are listed in and each one has to be perfectly implemented for you to receive the snowflake for it. 

If something is ambiguous then you are expected to make the best decision according to what was discussed during the lectures and labs. If things are still ambiguous, then any decision will be accepted.

You should have persistence to a database for all added data, so restarting the application should keep the data. You must commit and push everything to the github repository created by accepting the assignment (link on Teams) in order for it to be considered.

1. Display the following table in plain HTML when visiting the `/` route. You do not need to color the rows, but the borders must look like they do here, as does the text:

    |  **#**  | **Channel** | **Number of users** |
    |---------|----------|----------|
    | **1** |          |          |
    | **2** |          |          |
    
2. Add an `h1` tag above the table with the content **Messenger app** and a button below with the content **Create channel**.

3. When clicking on the **Create channel** button, you should see a popup / dialog that asks for the channel name. There should be a **Save** button that saves channel and a **Cancel** button that only closes the popup / dialog. On saving the channel, validate that the name is not empty. If valid, redirect the user to `/channels/<GUID>`, where `<GUID>` is a random GUID / UUID. We will call this the **Messenger Chat Page**, or `MCP`.

4. When someone accesses the `MCP`, validate that the `<GUID>` is valid and display an error if not. Otherwise, display a popup / dialog that asks for your nickname. It should have the same contents as the one for requirement `3` and it should validate that the nickname is unique within this channel. If the nickname is valid, after clicking the **Save** button, display an `h2` with the contents **Chatting in `<channel name>` as `<nickname>`**.

5. On the `MCP`, below the `h2`, add a table with 3 columns: **Mesage date and time**, **Nickname** and **Message**. Make all borders transparent. Below it, add a textbox with the label **Your message:**. Hitting the Enter key while that textbox is focused should make non-empty messages appear in the table and clear the textbox, together with the current Date and time and your nickname, in the corresponding columns. Keep the textbox focused. Refreshing the page should display everyone's messages.

6. On the `MCP`, use web sockets to display received messages in real time.

7. Split the contents of the `MCP` below the `h2` into two: on the left hand side, display all the nicknames that are part of the channel, ordered alphabetically. On the right hand side, display the table and the messaging textbox. Make the list of nicknames automatically refresh using web sockets when someone joins or leaves the channel. Below both sections, add a button with the contents **Leave channel** that makes you leave the channel and redirects you to `/` on click.

8. Implement user roles within a channel: the channel creator is an `admin` by default. Their nickname will have a `!` in front of it in the nicknames list. Show admins first in the list and keep them ordered alphabetically. Admins can make other users admins by sending the message `/admin <nickname>`. This should not show up in chat. If successful, display a corresponding message that only the sending user will see and make `<nickname>` an admin, updating the nicknames list. If unsuccessful (due to not being an admin or due to `<nickname>` not being a channel member), show an appropriate error message that only the sending user will see. Show the `!` for admins in the table containing the messages as well.

9. Dockerize your application. Running the docker container should start the frontend, the backend and anything else that you need. Everything should be started with a single docker or docker-compose command. If you have done this from the start, you will receive the snowflake now.

10. Add `swagger` for your backend. If you have done this from the start, you will receive the snowflake now.

11. Add the following commands for admins: `/kick <nickname>` - removes a user from the channel if they are not an admin and `/mute <seconds>` - prevents non-admins from sending messages to the channel for `<seconds>` seconds. Add appropriate feedback and error messages.

12. Add nickname colors for the members of a channel: each nickname should show up with a random color in the nicknames list and in the corresponding column of the table displaying chat messages. It's OK if refreshing the page changes the colors.

13. Update the table on `/` to show the list of channels, their index and the number of users. Either add a **Refresh** button that refreshes the table (but not the page) OR make it refresh in real time using web sockets. 

14. On the `/` page, clicking on a channel should take you to the `MCP` for that channel. Order the channels descendingly by the number of users.
    
15. On the `/` page add another column **Operations**. It should contain a **Delete** button that when clicked deletes the channel with confirmation. Deleting a channel causes all members to be redirected to `/` in real time.
