# Smart Farming News: Website

WordPress site for Smart Farming News, one of the five titles in the
18 September 2026 wave. Scaffolded 18 September 2026; not yet live.

Session prefix: `🚜 FARM`

## Naming

The brand is **Smart Farming News** (smartfarmingnews.com, bought 18 Sep 2026
at GoDaddy; the .com is the primary and only domain, no .co.uk). Slug
`smart-farming-news`.

"Smart farming" normally means agtech, which is Future Farming's ground
(futurefarming.com, a live global title), and Farmers Guide and Tech Farmer
also cover farm tech. The working angle is **farming smarter as a business**:
technology judged by its payback, plus the land-business money (energy leases,
natural capital, diversification, buildings, tax and succession). JB has not
yet confirmed the final lean. The sections are built so he can lean either way
without a rebuild (see the tracker).

## Layout

| Path | What it is |
|---|---|
| `child/` | Child theme of `cogent-base`; most edits belong here |

The parent theme lives in `cogent-base-theme/cogent-base`; never fork it, and
run its `check-title-agnostic.mjs --all` after touching anything shared (add
this title to TITLES and CHILDREN in that script first). Deploy with
`node scripts/deploy-theme.mjs --site=smart-farming-news --from=../smart-farming-news-website/child`
from `cogent-incubator` over SFTP, never a zip upload.

## The title rules

The money-question rule, the no-advice rule (tax, inheritance, succession,
tenancies; no political line on the farm tax), the claims rule (vendor and
yield claims attributed, never asserted) and the stay-off-the-daily-beat rule.
Full text in `cogent-incubator/scripts/alignment/smart-farming-news.editorial-standard.md`,
and in `docs/editorial-standard.md` once merged.

Collisions: vehicle and pickup tax belong to The Fleet Magazine; generic
small-business queries (farm shops, business rates) are Smart SME's ground.
Check the keyword registry before commissioning.

## Design

Launch-safe scaffold: Field Orange (#C2410C) on Graphite (#12151A), with Crop
Lime and Sensor Teal as accents. Display face Barlow Condensed (600 and 800),
mono JetBrains Mono. The masthead is the parent's typeset lockup until the drawn
mark is built with `cogent-base-theme/scripts/brand` (own face and structure,
never a recolour of a sibling). The Barlow files are TTFs from the brand kit;
convert them to woff2 at the design pass. (IBM Plex Sans is Dental Business
News's face; do not reuse it.)

## Launch tracking

`cogent-incubator/docs/smart-farming-news-launch.md` is the live checklist.
