<?php

        header("Content-Type: text/plain");

        $defaults = array(
                "ServerPort" => 53640,
                "ServerIP" => "127.0.0.1",
                "Username" => "Player"
        );

        $supplied = array(
                "Username" => (isset($_GET["Username"]) ? $_GET["Username"] : $defaults["Username"]),
                "ServerIP" => (isset($_GET["ServerIP"]) ? $_GET["ServerIP"] : $defaults["ServerIP"]),
                "ServerPort" => (isset($_GET["ServerPort"]) ? $_GET["ServerPort"] : $defaults["ServerPort"])
        );

        // Check for empty values
        foreach ($supplied as $p => $value) {
                if (empty($_GET[$p])) { $supplied[$p] = $defaults[$p]; }
        }

        // Validate username for use in-game
        if (strlen($supplied["Username"]) > 20) { $supplied["Username"] = substr($supplied["Username"], 0, 20); }
        $supplied["Username"] = preg_replace("/[^a-zA-Z0-9]+/", "", $supplied["Username"]);

        if (!filter_var($supplied["ServerPort"], FILTER_VALIDATE_INT) || $supplied["ServerPort"] > 65535) { $supplied["ServerPort"] = $defaults["ServerPort"]; }
        if (!filter_var($supplied["ServerIP"], FILTER_VALIDATE_IP)) { $supplied["ServerIP"] = $defaults["ServerIP"]; }
        
        $CurUrl = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        
        if (isset($_GET["l"])) { header("Location: RB07://" . $CurUrl); } // Launches the client with said joinscript

?>
--[[
        JoinScript generated for <?php echo $supplied["Username"]; ?>.<?php echo "\n"; ?>
        Connects to <?php echo $supplied["ServerIP"]; ?>:<?php echo $supplied["ServerPort"]; ?>.
--]]

local function FailMessage(m) game:SetMessage(m); wait(math.huge) end
local function ServeMessage(m) game:SetMessage(m) end

local Visit = game:GetService("Visit")
Visit:SetUploadUrl("")
ServeMessage("Joining the game...")

local NetworkClient = game:GetService("NetworkClient")

local Player = game:GetService("Players"):CreateLocalPlayer(<?php echo rand(1, 15000000); ?>)
Player.Name = "<?php echo $supplied["Username"]; ?>"
Player:SetSuperSafeChat(false)

local function ConnectionRejected()
        FailMessage("Failed to connect to the server. Connection refused.")
end

local function ConnectionFailed(p, eCode)
        FailMessage(string.format("Whoops. Failed to connect to the server. ID: %d", eCode))
end

local function Connected(u, Client)
        Client.Disconnection:connect(function()
                FailMessage("Connection to the server was lost.")
        end)
        local Marker = nil
        game:SetMessageBrickCount()
        Marker = Client:SendMarker()
        Marker.Received:connect(function()
                game:ClearMessage()
        end)
end

NetworkClient.ConnectionAccepted:connect(Connected)
NetworkClient.ConnectionRejected:connect(ConnectionRejected)
NetworkClient.ConnectionFailed:connect(ConnectionFailed)

NetworkClient:Connect("<?php echo $supplied["ServerIP"]; ?>", <?php echo $supplied["ServerPort"]; ?>, 0, 15)
