if(token) {
	const BugBattle = window.BugBattle.default;
	BugBattle.initialize(token, BugBattle.FEEDBACK_BUTTON);
} else {
	console.warn('Bugbattle:', 'Token not set')
}