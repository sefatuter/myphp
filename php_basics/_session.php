<?php
    session_start();
    echo "<br>";

    if (isset($_SESSION["username"])) {
        echo "👋 Welcome back, " . htmlspecialchars($_SESSION["username"]);
    } else {
        $_SESSION["username"] = "sefa";
        echo "🆕 Session started. Refresh to continue as: " . $_SESSION["username"];
    }


// Feature  	Cookie	              Session
// Stored in	Browser	              Server
// Visible	    Yes	                  No
// Secure	    ❌ (can be tampered)	✅ (server managed)
// Size limit	~4KB	              Large
// Use case	    Light prefs           Auth, cart, internal data

echo "<br>";

    $_SESSION["agent_level"] = "elite";

    // Handle session clear
    if (isset($_POST["clear"])) {
        session_unset();
        session_destroy();
        echo "🧹 Session cleared. Reload to reset.";
        exit;
    }

    if (isset($_SESSION["agent_level"])) {
        echo "Welcome, " . htmlspecialchars($_SESSION["agent_level"]);
    } else {
        echo "No session active.";
    }
?>
<br>
<!-- Clear button form -->
<form method="POST">
    <button type="submit" name="clear">Clear Session</button>
</form>