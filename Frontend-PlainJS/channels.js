const urlParams = new URLSearchParams(window.location.search);

const guid = urlParams.get('guid');
let channelName = "";
let nickname = "";

window.onload = initialize;

async function initialize() {
    const channel = await findChannel(guid);
    if (channel == null) {
        document.getElementById("channelNotFoundMessage").style.display = "block";
    } else {
        channelName = channel.name;
        showSetNicknameDialog(true);
    }
}

async function findChannel(guid) {
    return await fetch("../Backend-PHP/findChannelByGuid.php?guid=" + guid)
        .then(resp => resp.text())
        .then(text => {
            if (text === "" || text.startsWith('Error'))
                return null;
            const json = JSON.parse(text);
            if (!(json.hasOwnProperty("guid") && json.hasOwnProperty("name")))
                return null;
            return { guid: json.guid, name: json.name }
        })
        .catch(() => false);
}

function showSetNicknameDialog(value = true) {
    document.getElementById("setNicknameOverlay").style.display = value ? "block" : "none";
    document.getElementById("setNicknameDialog").style.display = value ? "block" : "none";
}

function setNickname_save() {
    const formData = new FormData();
    nickname = document.getElementById("nicknameInput").value;
    formData.append('nickname', nickname);
    formData.append('channelGuid', guid);
    fetch("../Backend-PHP/addUser.php", { method: 'POST', body: formData })
        .then(resp => resp.text())
        .then(text => {
            if (text === "OK") {
                showSetNicknameDialog(false);
                const successMsgElement = document.getElementById("successMessage");
                successMsgElement.innerText = successMsgElement.innerText
                    .replace("{channel}", channelName)
                    .replace("{nickname}", nickname);
                successMsgElement.style.display = "block";
            }
            else {
                alert("Cannot add user:\n" + text);
            }
        });
}

function setNickname_cancel() {
    showSetNicknameDialog(false);
    document.getElementById("failedNicknameMessage").style.display = "block";
}
