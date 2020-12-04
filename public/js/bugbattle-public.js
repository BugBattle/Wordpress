if (bugbattle_token) {
	const BugBattle = window.BugBattle.default;
	BugBattle.initialize(bugbattle_token, BugBattle.FEEDBACK_BUTTON);
} else {
	console.warn('Bugbattle:', 'Token not set')
}