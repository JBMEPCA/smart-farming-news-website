<?php
/**
 * Smart Farming News, child of cogent-base.
 *
 * Almost nothing belongs in here. The parent owns the layout, the templates,
 * the patterns and every calculator's arithmetic; this file exists to make the
 * editorial choices that are genuinely this title's.
 *
 * @package smart-farming-news
 */

defined( 'ABSPATH' ) || exit;

/*
 * NO cogent_tools FILTER, deliberately. The parent's default is no calculators,
 * and none of the existing ones transfers to a farm or landowner. The title's
 * own candidates, from the vertical brief (§8), are a land-use income index
 * (solar, battery storage, BNG and carbon ranges), an APR/IHT exposure
 * illustration (which must carry the no-advice framing) and a machinery
 * payback calculator. If one is built, add the filter then, and remember tools
 * are shortcodes on ordinary pages: create /tools/ and a page per calculator at
 * the same time or it 404s (playbook §3).
 */

/**
 * Who this title is, in its own words.
 *
 * Only overrides that the derived default gets wrong or gets dull are listed.
 * newsletter_kicker is absent because the parent already builds "Smart Farming
 * News Weekly" from the site name, and from_email because it already builds
 * noreply@smartfarmingnews.com from the site's own domain.
 */
add_filter( 'cogent_brand', function ( $brand ) {
	$brand['audience'] = 'the people who own, run and finance UK farms and rural land businesses';

	$brand['newsletter_promise'] = 'Farming smarter as a business: what the technology costs, what the land can earn, and who has done it.';
	$brand['newsletter_band']    = 'The best of Smart Farming News in your inbox: farm tech judged on payback, energy and natural capital deals, diversification and the tax rules that shape them. Free, weekly, no hype.';
	$brand['article_signup']     = 'One email a week: the costs, returns and deals UK farm businesses actually use.';

	/*
	 * Contact: the title's own mailbox on its own domain, following the
	 * jb@<domain> pattern every live title uses. It only works once the domain
	 * is a Workspace secondary domain (launch tracker, JB step 4). Until then,
	 * mail to it bounces, so confirm the mailbox before the site goes public.
	 */
	$brand['contact_email'] = 'jb@smartfarmingnews.com';

	/*
	 * Set explicitly rather than left to the derived default, because the
	 * launch checklist names this exact string: a Mailchimp audience called
	 * EXACTLY "Smart Farming News" must exist before launch, or signups queue
	 * locally with _sync = pending and resolution fails visibly on
	 * Settings, Smart Farming News in wp-admin.
	 */
	$brand['mailchimp_audience'] = 'Smart Farming News';

	/*
	 * linkedin_url is deliberately NOT set. The sidebar card and the footer
	 * render no LinkedIn link until the real company page URL is pasted in
	 * here. Never guess it: a guessed slug is how one title's footer pointed at
	 * a page that does not exist.
	 */

	$brand['sponsor_promise'] = 'Category sponsorships, newsletter slots and display packages. Talk to us about reaching UK farm owners, landowners and the advisers who work with them.';

	return $brand;
} );

/*
 * GA4: no cogent_ga4_id filter until the property exists (launch tracker, JB
 * step 7). If Site Kit ends up doing the tagging, leave this absent or the
 * visit is counted twice; if not, add:
 *
 * add_filter( 'cogent_ga4_id', function () {
 * 	return 'G-XXXXXXXXXX';
 * } );
 */

/**
 * The byline for this title.
 *
 * The parent forces every post onto one identity so the content engine's own
 * account cannot reach the byline, the author archive or the schema Google
 * reads. That identity is named here rather than in the parent, so this title
 * carries its own rather than inheriting another title's.
 *
 * OPEN DECISION (launch tracker): each live title bylines a named person, and
 * this title's person has not been chosen. james-burke is the launch-safe
 * value: a real person, the editor, and the parent's own fallback, so nothing
 * resolves to the administrator in the meantime. When the title's owner is
 * named, change this slug, create that WordPress user at author role with the
 * nicename matching exactly (check user_nicename, not user_login, playbook §3),
 * and set Site.authorName to the same person.
 *
 * The portrait is found by attachment slug, so the media library needs one
 * image whose slug matches. Without it the card falls back to initials.
 */
add_filter( 'cogent_author_slug', function () {
	return 'james-burke';
} );

/**
 * The homepage sections for this title, in home.html render order.
 *
 * The parent's plan only allocates articles to slugs on this list, and a
 * section the plan gave nothing to hides itself, so a missing or wrong list
 * renders the homepage with an empty middle while looking deliberate. Keep it
 * exactly in step with the section patterns home.html renders: a slug listed
 * here but not rendered has its articles reserved and then shown nowhere.
 *
 * The order interleaves the two halves of the angle so the homepage reads as
 * one title, not two. Tech sections: farm-tech, software-data. Land-business
 * sections: energy-land-use, natural-capital, diversification,
 * land-tax-succession. Both: news, finance-grants. Leaning the title one way
 * later is a reorder here and in home.html, plus section targets in the Site
 * row; no section needs to be deleted.
 */
add_filter( 'cogent_home_sections', function () {
	return array(
		'news',
		'energy-land-use',
		'farm-tech',
		'diversification',
		'software-data',
		'natural-capital',
		'finance-grants',
		'land-tax-succession',
	);
} );

/* masthead-art */
/**
 * The drawn masthead and tab icon, September 2026. The artwork is built by
 * cogent-base-theme/scripts/brand and copied into assets/brand/ by its
 * install.mjs; edit the spec there and reinstall rather than editing these
 * files. Both values need cogent-base 1.21.0 or later.
 *
 * masthead_art puts the artwork in the mobile menu; parts/header.html and
 * parts/footer.html carry the same files for the page itself.
 */
add_filter(
	'cogent_brand',
	function ( $brand ) {
		$brand['masthead_art'] = get_stylesheet_directory_uri() . '/assets/brand/wordmark-reversed.svg';
		return $brand;
	},
	20
);

/**
 * The tab icon is this title's own artwork. The parent passes its generated
 * split mark as the fallback, which is returned if the file is ever missing so
 * the tab is never left blank.
 */
add_filter(
	'cogent_favicon_svg',
	function ( $fallback ) {
		$file = get_stylesheet_directory() . '/assets/brand/favicon.svg';
		return is_readable( $file ) ? (string) file_get_contents( $file ) : $fallback;
	}
);
