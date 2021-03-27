<?php
/**
 * @package Hello_WAP
 * @version 1.7.2
 */
/*
Plugin Name: Hello WAP
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in one word sung most famously by Cardi B and Megan Thee Stallion: WAP. When activated you will randomly see a lyric from <cite>WAP</cite> in the upper right of your admin screen on every page.
Author: Leroy Rosales
Version: 1.0
Author URI: https://leroyrosales.com
*/

function hello_wap_get_lyric() {
	/** These are the lyrics to WAP */
	$lyrics = "I said, certified freak
	Seven days a week
	Wet-ass pussy
	Make that pull-out game weak, woo (ah)
	Yeah, yeah, yeah, yeah
	Yeah, you fucking with some wet-ass pussy
	Bring a bucket and a mop for this wet-ass pussy
	Give me everything you got for this wet-ass pussy
	Beat it up, nigga, catch a charge
	Extra large and extra hard
	Put this pussy right in your face
	Swipe your nose like a credit card
	Hop on top, I wanna ride
	I do a kegel while it's inside
	Spit in my mouth, look in my eyes
	This pussy is wet, come take a dive
	Tie me up like I'm surprised
	Let's role play, I'll wear a disguise
	I want you to park that big Mack truck
	Right in this little garage
	Make it cream, make me scream
	Out in public, make a scene
	I don't cook, I don't clean
	But let me tell you how I got this ring (ayy, ayy)
	Gobble me, swallow me, drip down the side of me (yeah)
	Quick, jump out 'fore you let it get inside of me (yeah)
	I tell him where to put it, never tell him where I'm 'bout to be
	I'll run down on him 'fore I have a nigga running me (pow, pow)
	Talk your shit, bite your lip (yeah)
	Ask for a car while you ride that dick (while you ride that dick)
	You really ain't never gotta fuck him for a thang (yeah)
	He already made his mind up 'fore he came (ayy, ah)
	Now get your boots and your coat (ah, ah, ah)
	For this wet-ass pussy
	He bought a phone just for pictures
	Of this wet-ass pussy (click, click, click)
	Pay my tuition just to kiss me
	On this wet-ass pussy (mwah, mwah, mwah)
	Now make it rain if you wanna
	See some wet-ass pussy (yeah, yeah)
	Look, I need a hard hitter, I need a deep stroker
	I need a Henny drinker, I need a weed smoker
	Not a garden snake, I need a king cobra
	With a hook in it, hope it lean over
	He got some money, then that's where I'm headed
	Pussy A1, just like his credit
	He got a beard, well, I'm tryna wet it
	I let him taste it, now he diabetic
	I don't wanna spit, I wanna gulp
	I wanna gag, I wanna choke
	I want you to touch that lil' dangly thing
	That swing in the back of my throat
	My head game is fire, punani Dasani
	It's going in dry and it's coming out soggy
	I ride on that thang like the cops is behind me (yeah, ah)
	I spit on his mic and now he tryna sign me, woo
	Your honor, I'm a freak bitch, handcuffs, leashes
	Switch my wig, make him feel like he cheating
	Put him on his knees, give him something to believe in
	Never lost a fight, but I'm looking for a beating (ah)
	In the food chain, I'm the one that eat ya
	If he ate my ass, he's a bottom feeder
	Big D stand for big demeanor
	I could make you bust before I ever meet ya
	If it don't hang, then he can't bang
	You can't hurt my feelings, but I like pain
	If he fuck me and ask, \"Whose is it?\"
	When I ride the dick, I'ma spell my name
	Ah (whores in this house)
	Yeah, yeah, yeah
	Yeah, you fucking with some wet-ass pussy
	Bring a bucket and a mop for this wet-ass pussy
	Give me everything you got for this wet-ass pussy
	Now from the top, make it drop
	That's some wet-ass pussy
	Now get a bucket and a mop
	That's some wet-ass pussy
	I'm talking WAP, WAP, WAP
	That's some wet-ass pussy
	Macaroni in a pot
	That's some wet-ass pussy, huh
	(There's some whores in this house)
	(There's some whores in this house)";

	// Here we split it into lines.
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line.
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later.
function hello_wap() {
	$chosen = hello_wap_get_lyric();
	$lang   = '';
	if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
		$lang = ' lang="en"';
	}

	printf(
		'<p id="dolly"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
		__( 'Quote from Hello Dolly song, by Jerry Herman:' ),
		$lang,
		$chosen
	);
}

// Now we set that function up to execute when the admin_notices action is called.
add_action( 'admin_notices', 'hello_wap' );

// We need some CSS to position the paragraph.
function hello_wap_css() {
	echo "
	<style type='text/css'>
	#dolly {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
	}
	.rtl #dolly {
		float: left;
	}
	.block-editor-page #dolly {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#dolly,
		.rtl #dolly {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action( 'admin_head', 'hello_wap_css' );
