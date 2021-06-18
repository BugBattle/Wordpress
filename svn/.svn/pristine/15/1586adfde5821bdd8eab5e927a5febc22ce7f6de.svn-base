if (bugbattle_has_permission === "true") {
  if (bugbattle_token) {
    const BugBattle = window.BugBattle.default;

    BugBattle.initialize(bugbattle_token, BugBattle.FEEDBACK_BUTTON);

    if (bugbattle_enable_privacy_policy === true) {
      BugBattle.enablePrivacyPolicy(bugbattle_enable_privacy_policy);
      BugBattle.setPrivacyPolicyUrl(bugbattle_privacy_policy_url);
    }

    if (bugbattle_color) {
      BugBattle.setMainColor(bugbattle_color);
    }

    if (bugbattle_enable_crash_detector === true) {
      BugBattle.enableCrashDetector(true, true);
    }

    if (bugbattle_enable_replays === true) {
      BugBattle.enableReplays(true);
    }

    if (bugbattle_enable_network_logs === true) {
      BugBattle.enableNetworkLogger();
    }
  } else {
    console.warn("Bugbattle:", "API token not set.");
  }
}