function showCreateChannelDialog() {
    document.getElementById("createChannelPopup").style.display = "block";
    document.getElementById("createChannelOverlay").style.display = "block";
}

function createChannel_save() {
    // Send a post request to the backend to create a new channel
    const guid = uuidv4();
    const channelName = document.getElementById("channelNameInput").value;

    const formData = new FormData();
    formData.append('guid', guid);
    formData.append('channelName', channelName);

    fetch('../Backend-PHP/addChannel.php', {method: 'POST', body: formData})
        .then(resp => resp.text())
        .then(text => {
            if (text === "OK")
                window.location.href = "channels.html?guid=" + guid;
            else
                alert("Cannot add channel:\n" + text);
        });
}

function hideCreateChannelDialog() {
    //document.getElementById("channelNameInput").value = "";
    document.getElementById("createChannelPopup").style.display = "none";
    document.getElementById("createChannelOverlay").style.display = "none";
}

function uuidv4() {
    return ([1e7]+-1e3+-4e3+-8e3+-1e11).replace(/[018]/g, c =>
        (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
    );
}
