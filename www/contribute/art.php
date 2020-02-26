<?
require_once('Core.php');
?><?= Template::Header(['title' => 'Art Manual', 'js' => true, 'highlight' => 'contribute', 'description' => 'The Standard Ebooks Art Manual, containing details on cover and titlepage images, cover art requirements, and public domain research requirements and tips.']) ?>
<main>
	<article>
		<h1>Art Manual</h1>
		<aside class="alert">
			<p>Standard Ebooks is a brand-new project&mdash;this manual is a pre-alpha, and much of it is incomplete. If you have a question, need clarification, or run in to an issue not yet covered here, please <a href="https://groups.google.com/forum/#!forum/standardebooks">contact us</a> so we can update this manual.</p>
		</aside>
		<section id="general-notes">
			<h2>General notes</h2>
			<ul>
				<li>
					<p>When you create a new Standard Ebooks draft using <code class="program">se create-draft</code>, you’ll already have templates for the cover and titlepage images present in <code class="path">DRAFT-ROOT/images/</code>. The text in the <abbr class="initialism">SVG</abbr> files is represented as text, not paths, so you can edit them using a text editor and not an <abbr class="initialism">SVG</abbr> editor. Then, <code class="program">se build-images</code> converts these text-based source images into path-based compiled images, for distribution in the final epub file. We do this so to avoid having to distribute the font files along with the epub.</p>
				</li>
				<li>
					<p>To develop cover and titlepage images, you must have the free <a href="https://github.com/theleagueof/league-spartan">League Spartan</a> and <a href="https://github.com/theleagueof/sorts-mill-goudy">Sorts Mill Goudy</a> fonts installed on your system.</p>
				</li>
			</ul>
		</section>
		<section id="list-of-files">
			<h2>Complete list of files</h2>
			<p>A complete set of image source files consists of:</p>
			<ul>
				<li>
					<p><code class="path">DRAFT-ROOT/images/cover.source.jpg</code>: The full source image used for the cover art, in as high a resolution as possible. Can be of any image format, but typically we end up with <abbr class="initialism">JPG</abbr>s.</p>
				</li>
				<li>
					<p><code class="path">DRAFT-ROOT/images/cover.jpg</code>: A cropped part of the source image that will serve as the actual image file we use in the cover. Must be exactly 1400w × 2100h.</p>
				</li>
				<li>
					<p><code class="path">DRAFT-ROOT/images/cover.svg</code>: The <abbr class="initialism">SVG</abbr> source file for the cover, with any text represented as actual, editable text. Must be exactly 1400w × 2100h pixels. Since the final cover image <abbr class="initialism">SVG</abbr> has the text converted to paths, we keep this file around to make it easier to make changes to the cover in the future.</p>
				</li>
				<li>
					<p><code class="path">DRAFT-ROOT/src/epub/images/cover.svg</code>: The final <abbr class="initialism">SVG</abbr> cover image. This image should be exactly like <code class="path">DRAFT-ROOT/images/cover.svg</code>, but with the text converted to paths.</p>
					<p>This image is generated by <code class="path">se build-images</code>.</p>
				</li>
				<li>
					<p><code class="path">DRAFT-ROOT/images/titlepage.svg</code>: The <abbr class="initialism">SVG</abbr> source file for the titlepage, with any text represented as actual, editable text. Must be exactly 1400 pixels wide, but the height must exactly match the text height plus some padding (described below).</p>
				</li>
				<li>
					<p><code class="path">DRAFT-ROOT/src/epub/images/titlepage.svg</code>: The final <abbr class="initialism">SVG</abbr> titlepage image, with text converted to paths just like the cover page.</p>
					<p>This image is generated by <code class="path">se build-images</code>.</p>
				</li>
			</ul>
		</section>
		<section id="cover-image">
			<h2>The cover image</h2>
			<aside class="alert">
				<p>The SE Editor-in-Chief must review and approve of the cover art you select before you can commit it to your repository.</p>
				<p><strong>Do not commit cover art without contacting the mailing list first!</strong></p>
			</aside>
			<p>There are three cover image templates available to you based on how long the ebook’s title is. <code class="path">create-draft</code> tries to guess which one to use, but it may not be correct. If your novel title is too long to fit in the template <code class="path">create-draft</code> picked for you, you can try a different cover image template. They’re located in the <a href="https://github.com/standardebooks/tools">Standard Ebooks toolset</a> <code class="path">TOOLSET-ROOT/se/data/templates/</code> folder.</p>
			<p>To edit <code class="path">DRAFT-ROOT/images/cover.svg</code>, simply open it with your favorite text editor. Replace “NOVEL” with your novel’s title and “AUTHOR” with the author.</p>
			<p>Only use a text editor to edit <code class="path">cover.svg</code>, not an SVG editing program like Inkscape. <abbr class="initialism">SVG</abbr> editors like Inkscape often reformat <abbr class="initialism">SVG</abbr>s and insert all sorts of useless metadata.</p>
			<p>You must have the free <a href="https://github.com/theleagueof/league-spartan">League Spartan</a> font installed on your system for the cover to render and build correctly.</p>
			<h3>Cover image SVG rules</h3>
			<ul>
				<li>
					<p>Both the title and author are in League Spartan font with 5px letter spacing in ALL CAPS.</p>
				</li>
				<li>
					<p>The left and right sides of the black title box must have at least 40px padding. More padding is preferrable over cramming the title in.</p>
				</li>
				<li>
					<p>For the title lines:</p>
					<ul>
						<li>
							<p>One-line titles: the line is 80px tall. <a href="/ebooks/niccolo-machiavelli/the-prince/w-k-marriott">Example.</a></p>
						</li>
						<li>
							<p>Two-line titles: each line is 80px tall, and the second title line is 20px below the first line. <a href="/ebooks/fyodor-dostoevsky/crime-and-punishment/constance-garnett">Example.</a></p>
						</li>
						<li>
							<p>Two-line, very long titles: each line is 60px tall, and the second line is 20px below the first line. <a href="/ebooks/selma-lagerlof/the-wonderful-adventures-of-nils/velma-swanston-howard">Example.</a></p>
						</li>
						<li>
							<p>Two-line, extremely long titles: each line is 50px tall, and the second line is 20px below the first line. <a href="/ebooks/rudolph-erich-raspe/the-surprising-adventures-of-baron-munchausen">Example.</a></p>
						</li>
					</ul>
				</li>
				<li>
					<p>For the author lines:</p>
					<ul>
						<li>
							<p>The first author line begins 60px below the last title line.</p>
						</li>
						<li>
							<p>One-line authors: the line is 40px tall.</p>
						</li>
						<li>
							<p>Two-line authors: each line is 40px tall, and the second author line is 20px below the first line.</p>
						</li>
					</ul>
				</li>
				<li>
					<p>Once the author and title lines are the correct distance from each other, the group of both should be horizontally centered in the black title box.</p>
				</li>
				<li>
					<p><code class="path">cover.svg</code> uses <code class="path">cover.jpg</code> as the canvas background.</p>
				</li>
				<li>
					<p><code class="path">cover.jpg</code> is exactly 1400w × 2100h pixels, and should be compressed to be no larger than one megabyte. This might not always be possible while maintining an acceptable level of image quality, but keeping the file size of <code class="path">cover.jpg</code> as small as possible is desirable.</p>
				</li>
				<li>
					<p>Because <code class="path">cover.jpg</code> is a large image, you should source it from a high-quality scan. This might not always be possible, so it’s allowed to upscale the source image a small amount. But, for example, don’t use a 300w × 500h image as a source; that wouldn’t scale up well.</p>
				</li>
			</ul>
			<h3>Cover image artwork rules</h3>
			<p>Once you’ve set up <code class="path">cover.svg</code>, it’s time to find a suitable fine art painting to use for the cover image.</p>
			<p>The paintings we use are all in the U.S. public domain (PD). Your task is to locate a painting suitable for the kind of book you’re producing, and then demonstrate that the painting is indeed in the U.S. public domain.</p>
			<p>U.S. copyright law is complicated. Because of this, <strong>we <em>require</em> that you provide a link to a page scan of a 1924-or-older book that reproduces the painting you selected.</strong> <em>This is a hard requirement</em> to demonstrate that the painting you selected is in fact in the U.S. public domain. Just because a painting is very old, or Wikipedia says it’s PD, or it’s PD in a country besides the U.S., doesn’t necessarily mean it actually <em>is</em> PD in the U.S.</p>
			<p>The painting you select must be a fine-art oil painting. We require this to maintain a consistency in the overall style of all of our covers.</p>
			<h3>Tips for location 1924-or-older reproductions of cover art</h3>
			<p>To actually demonstrate that a painting is PD, you must locate a reproduction of that painting in a 1924-or-older book.</p>
			<p>This can be quite difficult. Many people find this to be the most time-consuming part of the ebook production process.</p>
			<p>Because of the difficulty, finding suitable cover at is <em>all about compromise</em>. You’re unlikely to find the perfect cover image. You’ll find a lot of paintings that would be great matches, but that you can’t find reproductions of and thus we can’t use. So, be ready to compromise.</p>
			<h4>General tips</h4>
			<ul>
				<li>
					<p>Before you can go looking for a reproduction of a specific painting to prove its PD status, you have to find a suitable painting to begin with. <a href="https://www.wikiart.org/">Wikiart.org</a> is a great resource to search paintings by keyword. Museum online collections are another good place to look for inspiration. Once you find a potential candidate, then you can start researching its PD status.</p>
				</li>
				<li>
					<p>When searching for cover art, remember that artist names and painting titles may be spelled in many different ways. Often a painting went by multiple titles, or if the title was not in English, by many different translations. Your best bet is to simply search for an artist’s last name, and not the painting title.</p>
				</li>
				<li>
					<p>Once you locate a book with reproductions, open the book up in thumbnail view and quickly eyeball the pages to see if the artwork is reproduced there.</p>
				</li>
				<li>
					<p>Note that if your IP address is not in the U.S., many book archives like Google Books and HathiTrust may disable book previews.</p>
				</li>
				<li>
					<p>Many museum online catalogs have a “bibliography” or “references” section for each painting in their collection. This is usually a list of books in which the painting was either mentioned or reproduced. This is a good shortcut to finding the names of books in which a painting was reproduced, and if you’re lucky, a search for the book title in Google Books will turn up scans.</p>
				</li>
				<li>
					<p>In <code class="path">cover.svg</code>, the black title and author box always goes in the lower half of the work. Thus, paintings in which some important detail would be obscured by the box cannot be used.</p>
				</li>
			</ul>
			<h4>Gotchas</h4>
			<ul>
				<li>
					<p>Sometimes the catalog record for a book has an incorrect publication year. Please verify the page scan of the copyright page to ensure the book is 1924 or older.</p>
				</li>
				<li>
					<p>In older books it was common to have <em>etchings</em> of paintings. Etchings are not strict reproductions, and so we cannot count them when researching PD status.</p>
				</li>
				<li>
					<p>Oftentimes painters would produce several different versions of the same artwork. You must carefully compare the reproduction in the page scan with the high-resolution artwork scan you found to ensure they are the same painting. Small details like the position of trees, clouds, reflections, or water are good ways to check if the painting is identical, or if you’re looking at a different version.</p>
				</li>
			</ul>
			<h4>PD research step-by-step</h4>
			<ol>
				<li>
					<p>Your first stop should be Google Books. Google Books allows you to filter results so that you only see 1924-or-older books. <a href="https://www.google.com/webhp?tbs=cdr:1,cd_min:,cd_max:1924&amp;tbm=bks">You can use this shortcut to search Google Books for 1924-or-older books.</a></p>
					<p>Google Books is a convenient first stop because its thumbnail view is very fast, and it does a better job of highlighting search results than HathiTrust or Internet Archive.</p>
				</li>
				<li>
					<p>If you can’t find anything on Google Books, next go to HathiTrust. HathiTrust’s thumbnail view is much slower, but it has a different catalog than Google Books does. <a href="https://babel.hathitrust.org/cgi/ls?a=srchls&amp;anyall1=all&amp;q1=&amp;field1=ocr&amp;op3=AND&amp;yop=before&amp;pdate_end=1924">You can use this shortcut to search HathiTrust for 1924-or-older books.</a></p>
				</li>
				<li>
					<p>Lastly, try the Internet Archive. IA has a similar catalog as Google Books, but you may still find something there. <a href="https://archive.org/search.php?query=+date%3A%5B1850-01-01+TO+1924-12-31%5D&amp;sin=TXT&amp;sort=-date">You can use this shortcut to search the Internet Archive for 1924-or-older books.</a></p>
				</li>
				<li>
					<p>Once you’ve found a reproduction of your artwork in a 1924-or-older book, you need to find a high-resolution color scan that we can use for the cover. Various museum sites can be good for this, along with <a href="https://commons.wikimedia.org">Wikimedia Commons</a>, <a href="https://www.google.com/culturalinstitute/project/art-project">Google Art Project</a>, and <a href="https://www.wikiart.org">Wikiart.org</a>.</p>
				</li>
			</ol>
			<h4 id="pd-research-resources">PD research resources</h4>
			<p>Evan Hall has begun compiling a spreadsheet of artwork for use in our ebooks. You can <a href="https://docs.google.com/spreadsheets/d/1BqmDx4EvkRxbJAijFBIZOkawyflGBMJzom-fVhLC5-0/edit#gid=557113123">view it here</a>.</p>
			<p>You may find these resources helpful in your PD research:</p>
			<ul>
				<li>
					<p><a href="https://books.google.com/books?id=Q3YoAAAAYAAJ">Art Studies for Schools: Or, Hints on the Use of Reproductions of High Art ...</a></p>
				</li>
				<li>
					<p><a href="https://babel.hathitrust.org/cgi/pt?id=gri.ark:/13960/t7xm3q676;view=thumb;seq=13">Catalogue of the ... annual exhibition / The Pennsylvania ... 1912</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/009438195">Catalog Record: Art at the Royal Academy, London, 1897</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/100913061">Catalog Record: The work of John S. Sargent, R.A.</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/100344701">Catalog Record: Cubists and post-impressionism</a></p>
				</li>
				<li>
					<p><a href="https://babel.hathitrust.org/cgi/pt?id=uc2.ark:/13960/t8cf9x30t;view=thumb;seq=229">The Luxembourg museum; its paintings. Three hundred and eighty-nine ...</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/009438136">Catalog Record: Illustrated catalogue : paintings in the...</a></p>
				</li>
				<li>
					<p><a href="https://books.google.com/books?id=Qn1FAQAAMAAJ">A.L.A. Portrait Index: Index to Portraits Contained in Printed Books and ...</a></p>
				</li>
				<li>
					<p><a href="https://babel.hathitrust.org/cgi/pt?id=njp.32101066379189;view=thumb;seq=5">The Nicolas Roerich exhibition, with introduction and catalogue ...</a></p>
				</li>
				<li>
					<p><a href="https://books.google.com/books?id=NBgtAAAAYAAJ">Art of the British Empire Overseas - Charles Holme</a></p>
				</li>
				<li>
					<p><a href="https://books.google.com/books?id=i6hEAQAAMAAJ">The International Studio</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/008018731">Catalog Record: Royal Academy pictures and sculpture</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/100237187">Catalog Record: Paris-Salon, 1883</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/000352339">Catalog Record: Farbige Tierbilder</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/000287970">Catalog Record: Catalogue of the Berlin Photographic Company...</a></p>
				</li>
				<li>
					<p><a href="https://babel.hathitrust.org/cgi/pt?id=uc1.b3068561;view=thumb;seq=165">Katalog der Grossen Berliner Kunstausstellung, 1912.</a></p>
				</li>
				<li>
					<p><a href="https://babel.hathitrust.org/cgi/pt?id=umn.31951p00149881h;view=thumb;seq=161">Grosse Berliner Kunst-Ausstellung, 1900 : Katalog.</a></p>
				</li>
				<li>
					<p><a href="https://babel.hathitrust.org/cgi/pt?id=wu.89056204787;view=thumb;seq=161">Illustrirter Katalog / Grosse Berliner Kunst-Ausstellung. ... 1903.</a></p>
				</li>
				<li>
					<p><a href="https://babel.hathitrust.org/cgi/pt?id=umn.31951000746060s;view=thumb;seq=1">La Ilustración ibérica. t.14 (1896).</a></p>
				</li>
				<li>
					<p><a href="https://babel.hathitrust.org/cgi/pt?id=gri.ark:/13960/t08w61g82;view=thumb;seq=349">Entwickelungsgeschichte der modernen Kunst : ... 3.</a></p>
				</li>
				<li>
					<p><a href="https://babel.hathitrust.org/cgi/pt?id=nnc1.ar62882988;view=thumb;seq=1">Illustrated catalogue of highly important old and modern paintings ...</a></p>
				</li>
				<li>
					<p><a href="https://babel.hathitrust.org/cgi/pt?id=mdp.39015015820817;view=thumb;seq=541">Pittura, scultura futuriste (dinamismo plastico) Con 51 riproduzioni ...</a></p>
				</li>
				<li>
					<p><a href="http://www.twainquotes.com/UniformEds/UniformEdsCh33.html">Harper and Brothers Pictorial Hardcover and Gift Editions</a></p>
				</li>
				<li>
					<p><a href="http://brandywine.doetech.net/Detlobjps.cfm?ParentListID=126891&amp;ObjectID=1531590&amp;rec_num=175">Object Detail</a></p>
				</li>
				<li>
					<p><a href="https://babel.hathitrust.org/cgi/pt?id=yale.39002088545273;view=thumb;seq=57">(this is a whole series) Royal Academy pictures and sculpture. 1900</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/011254573">Catalog Record: The art of the Hon. John Collier</a></p>
				</li>
				<li>
					<p><a href="https://books.google.com/books?id=_0w4AAAAMAAJ">The Story of American Painting: The Evolution of Painting in America from ... - Charles Henry Caffin</a></p>
				</li>
				<li>
					<p><a href="https://archive.org/details/diekunstmonatshe21mnuoft">Die Kunst : Monatsheft für freie und angewandte Kunst</a></p>
				</li>
				<li>
					<p><a href="https://archive.org/stream/cubistesfuturist00coquuoft#page/267/mode/thumb">Cubistes, futuristes, passéistes; essai sur la ...</a></p>
				</li>
				<li>
					<p><a href="https://archive.org/stream/einblickin00wald#page/23/mode/thumb">Einblick in Kunst: Expressionismus, Futurismus,...</a></p>
				</li>
				<li>
					<p><a href="https://archive.org/stream/studiointernatio54lond#page/8/mode/thumb">Studio international</a></p>
				</li>
				<li>
					<p><a href="https://books.google.com/books?id=q7GUsAXiiA4C">The Magazine of Art</a></p>
				</li>
				<li>
					<p><a href="https://books.google.com/books?id=sdJAAAAAYAAJ">Cubists and Post-impressionism - Arthur Jerome Eddy</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/100344340">Catalog Record: L&#39;art flamand</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/100445834">Catalog Record: L&#39;école belge de peinture, 1830-1905</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/100578657">Catalog Record: Fernand Khnopff</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/000640739">Catalog Record: Gazette des beaux-arts (FULL SERIES)</a></p>
				</li>
				<li>
					<p><a href="https://archive.org/stream/catalogueofficiel00expo#page/40/mode/thumb">Catalogue officiel illustré de l&#39;Exposition cen...</a></p>
				</li>
				<li>
					<p><a href="https://babel.hathitrust.org/cgi/pt?id=njp.32101067654994;view=1up;seq=6">Offizieller Katalog der Internationalen Kunst-Ausstellung ... (1899).</a></p>
				</li>
				<li>
					<p><a href="https://babel.hathitrust.org/cgi/pt?id=wu.89057259921;view=1up;seq=23">British painting, by Irene Maguinness.</a></p>
				</li>
				<li>
					<p><a href="https://books.google.com/books?id=Jl9OAQAAMAAJ">Illustrated Catalogue: Paintings in the Metropolitan Museum of Art, New York - George Henry Story</a></p>
				</li>
				<li>
					<p><a href="https://archive.org/stream/bub_gb_yxRaAAAAYAAJ#page/n54/mode/thumb">Impressionisten Guys, Manet, Van Gogh, Pissarro...</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/000636935">Catalog Record: The Royal Academy illustrated</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/000071454">Catalog Record: The Art journal</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/100585480">Catalog Record: Handbuch der Kunstgeschichte</a></p>
				</li>
				<li>
					<p><a href="https://babel.hathitrust.org/cgi/pt?id=nyp.33433082172564;view=thumb;seq=9">Catalogue of the annual exhibition. v. 70-71 (1901-1902).</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/000521207">Catalog Record: Catalogue of the annual exhibition of...</a></p>
				</li>
				<li>
					<p><a href="https://books.google.com/books?id=mEpGAQAAIAAJ">Meissonier, his life and his art - Jean Louis Ernest Meissonier, Octave Gréard</a></p>
				</li>
				<li>
					<p><a href="https://babel.hathitrust.org/cgi/pt?id=gri.ark:/13960/t4fn6k42j;view=thumb;seq=41">Catalogue of the ... annual exhibition / The Pennsylvania ... 1905.</a></p>
				</li>
				<li>
					<p><a href="https://books.google.com/books?id=xCtAAAAAYAAJ">Zur Geschichte der Düsseldorfer Kunst insbesondere im xix. Jahrhundert - Friedrich Schaarschmidt</a></p>
				</li>
				<li>
					<p><a href="https://books.google.com/books?id=v7hHAQAAIAAJ">Bryan&#39;s dictionary of painters and engravers - Michael Bryan, George Charles Williamson</a></p>
				</li>
				<li>
					<p><a href="https://archive.org/details/memorialexhibiti00eaki">Memorial exhibition of the works of the late Thomas Eakins, beginning December 23, 1917 and continuing through January 13, 1918 : Eakins, Thomas, 1844-1916</a></p>
				</li>
				<li>
					<p><a href="https://books.google.com/books?id=CSFbAAAAYAAJ">Kunst und Künstler: Illustrierte Monatsschrift für bildende Kunst und ... - Karl Scheffler</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/000415396">Catalog Record: Gauguin et le groupe de Pont-Aven. Documents...</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/000062223">Catalog Record: Salon of the &amp;quot;Nationale</a></p>
				</li>
				<li>
					<p><a href="https://books.google.com/books?id=JAcrAAAAYAAJ">Academy Notes</a></p>
				</li>
				<li>
					<p><a href="https://books.google.com/books?id=etcwAQAAMAAJ">Great Painters of the XLX Century and Their Paintings - Léonce Bénédite</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/005722615">Catalog Record: Catalogue of paintings and drawings</a></p>
				</li>
				<li>
					<p><a href="https://books.google.com/books?id=nH9HAQAAMAAJ">The International Studio</a></p>
				</li>
				<li>
					<p><a href="https://books.google.com/books?id=B6saAAAAYAAJ&">Exhibition: Oil Paintings by Contemporary American Artists</a></p>
				</li>
				<li>
					<p><a href="https://books.google.com/books?id=oYdLAQAAMAAJ">Catalogue of the ... Annual Exhibition of the Pennsylvania Academy of the ...</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/000523379">Catalog Record: Studio international</a></p>
				</li>
				<li>
					<p><a href="https://books.google.com/books?id=xCtAAAAAYAAJ">Zur Geschichte der Düsseldorfer Kunst insbesondere im xix. Jahrhundert</a></p>
				</li>
				<li>
					<p><a href="https://babel.hathitrust.org/cgi/pt?id=njp.32101079835656;view=thumb;seq=1">Catalogue of the paintings and sketches of the late Thomas Hill</a></p>
				</li>
				<li>
					<p><a href="https://babel.hathitrust.org/cgi/pt?id=iau.31858028830473;view=thumb;seq=1">Picturesque California</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/000417706">Hubert Robert</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/100439727">The Copley prints; reproductions of notable paintings</a></p>
				</li>
				<li>
					<p><a href="https://archive.org/details/cu31924014892024">Scottish painting past and present, 1620-1908</a></p>
				</li>
				<li>
					<p><a href="https://archive.org/stream/cyclopediaofpain03chamuoft">Cyclopedia of Painters and Paintings</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/009437624">Art in Australia (series)</a></p>
				</li>
				<li>
					<p><a href="https://archive.org/stream/julianashtonbook00asht#page/14/mode/thumb">The Julian Ashton Book</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/100951925">Das Museum (11 volume series, see Hathi catalog listing for other volumes</a></p>
				</li>
				<li>
					<p><a href="https://babel.hathitrust.org/cgi/pt?id=umn.31951001591477w;view=thumb">Belgian Art in Exile</a></p>
				</li>
				<li>
					<p><a href="https://archive.org/stream/expositiongn1907expo">Exposition Generale des Beaux-Arts Bruxelles 1907</a></p>
				</li>
				<li>
					<p><a href="https://books.google.com/books?id=91FJAQAAMAAJ">Grützner</a></p>
				</li>
				<li>
					<p><a href="https://catalog.hathitrust.org/Record/100598168">Ruska S kola mali r ska (Russian art)</a>
					</p>
				</li>
			</ul>
			<h4 id="faq">Cover art FAQs</h4>
			<ul>
				<li>
					<p><b>I found a great painting, and Wikipedia says it’s public domain, but I can’t find a reproduction in a book. Can I use it?</b></p>
					<p>No. You must find a reproduction of your selected painting in a book published in 1924 or earlier.</p>
				</li>
				<li>
					<p><b>I found a great painting, and it’s really old, and the author died a long time ago, but I can’t find a reproduction in a book. Can I use it?</b></p>
					<p>No. You must find a reproduction of your selected painting in a book published in 1924 or earlier.</p>
				</li>
				<li>
					<p><b>I’ve found a reproduction in a book, but the book was published in 1924. Is that OK?</b></p>
					<p>No. You must find a reproduction of your selected painting in a book published in 1924 or earlier.</p>
				</li>
				<li>
					<p><b>I’ve found a scan on a museum site. Is that OK?</b></p>
					<p>No. You must find a reproduction of your selected painting in a book published in 1924 or earlier.</p>
				</li>
				<li>
					<p><b>But...</b></p>
					<p>No. You must find a reproduction of your selected painting in a book published in 1924 or earlier.</p>
				</li>
			</ul>
			<h4 id="museums">Museums with explicit CC0 collections</h4>
			<p>Images that are explicitly marked as CC0 from these museums can be used without further research. Not all of their images are CC0, you must confirm the presence of a CC0 license on the specific image you want to use.</p>
			<ul>
				<li>
					<p><a href="https://www.rijksmuseum.nl/en/search?q=&f=1&p=1&ps=12&type=painting&imgonly=True&st=Objects">Rijksmuseum</a> (Open the "Object Data" section and check they "Copyright" entry under the "Acquisition and right" section to confirm CC0)</p>
				</li>
				<li>
					<p><a href="https://www.europeana.eu/portal/en/collections/art?f%5BDATA_PROVIDER%5D%5B%5D=Finnish+National+Gallery&f%5BREUSABILITY%5D%5B%5D=open&f%5BRIGHTS%5D%5B%5D=http%2A%3A%2F%2Fcreativecommons.org%2F%2Apublicdomain%2Fzero%2A&per_page=96&view=grid">Finnish National Gallery via Europeana</a> (Use the "View at" link under the "Find out more" header to confirm CC0 license at the museum's site)</p>
				</li>
				<li>
					<p><a href="https://www.metmuseum.org/art/collection/search#!/search?material=Paintings&showOnly=withImage%7Copenaccess&sortBy=Relevance&sortOrder=asc&perPage=20&offset=0&pageSize=0">Met Museum</a> (CC0 items have the CC0 logo under the image)</p>
				</li>
				<li>
					<p><a href="https://www.nationalmuseum.se/">National Museum Sweden</a> (CC-PD items have the CC-PD mark in the lower left of the item's detail view)</p>
				</li>
				<li>
					<p><a href="https://art.thewalters.org/">The Walters Art Museum</a> (Public domain items are listed as "CC Creative Commons License" which links to a CC0 rights page)</p></li>
				<li>
					<p><a href="https://www.artic.edu/collection?q=test&is_public_domain=1">Art Institute of Chicago</a> (CC0 items say CC0 in the lower left of the painting in the art detail page)</p>
				</li>
				<li>
					<p><a href="http://www.clevelandart.org/art/collection/search?only-open-access=1&filter-type=Painting">Cleveland Museum of Art</a> (CC0 items have the CC0 logo near the download button.)</p>
				</li>
				<li>
					<p><a href="http://parismuseescollections.paris.fr/en/recherche/image-libre/true/avec-image/true/denominations/peinture-166168?mode=mosaique&solrsort=ds_created%20desc">Paris Musées</a> (CC0 items have the CC0 logo near the download button.)</p>
				</li>
				<li>
					<p><a href="https://www.si.edu/search/collection-images?edan_q=&amp;edan_fq[0]=object_type%3A&quot;Paintings&quot;">The Smithsonian</a> (CC0 items say CC0 under the Usage header in the item details.)</p>
				</li>
			</ul>
			<h2>Cover image step-by-step</h2>
			<ol>
				<li>
					<p>Locate an appropriate high-resolution public domain work to use as the cover image background. Name this unchanged file <code class="path">DRAFT-ROOT/images/cover.source.jpg</code> (or .png, or .bmp, or whatever the original file format is).</p>
				</li>
				<li>
					<p>Crop or scale the source image to create a 1400w × 2100h image that will be the actual cover background. Name this file <code class="path">DRAFT-ROOT/images/cover.jpg</code> and save it at 75% compression (if that looks good enough).</p>
				</li>
				<li>
					<p>If you used <code class="progam">se create-draft</code> to initialize your repository, then <code class="path">DRAFT-ROOT/images/cover.svg</code> is initialized with the work title and author and what should be the correct font size. If not, copy the cover image template from <code class="path">TOOLSET-ROOT/se/data/templates/cover.svg</code> into the same directory as <code class="path">cover.jpg</code>. Open your working copy of <code class="path">DRAFT-ROOT/images/cover.svg</code> with a text editor and edit the work name and author, and remove any unused template CSS.</p>
				</li>
				<li>
					<p>Finally, generate <code class="path">DRAFT-ROOT/src/epub/images/cover.svg</code> by running <code class="program">se build-images</code>. (This script also generates the titlepage images, if available.)</p>
				</li>
			</ol>
		</section>
		<section id="titlepage-image">
			<h2>The titlepage image</h2>
			<p><code class="path">create-draft</code> creates a titlepage image template for you that is correctly sized and arranged, and no more editing should be necessary. If you prefer to create one by hand, here are the various requirements for titlepage images.</p>
			<p>To edit <code class="path">DRAFT-ROOT/images/titlepage.svg</code>, simply open it with your favorite text editor.</p>
			<p>Only use a text editor to edit <code class="path">cover.svg</code>, not an SVG editing program like Inkscape. <abbr class="initialism">SVG</abbr> editors like Inkscape often reformat <abbr class="initialism">SVG</abbr>s and insert all sorts of useless metadata.</p>
			<p>You must have the free <a href="https://github.com/theleagueof/league-spartan">League Spartan</a> and <a href="https://github.com/theleagueof/sorts-mill-goudy">Sorts Mill Goudy Italic</a> font installed on your system for the titlepage to render and build correctly.</p>
			<h3>Titlepage image SVG rules</h3>
			<ul>
				<li>
					<p>The title, author, and the names of other contributors are in League Spartan font with 5px letter spacing in ALL CAPS.</p>
				</li>
				<li>
					<p>Do not include subtitles in the titlepage. For example, the titlepage would contain “THE MAN WHO WAS THURSDAY”, but not “THE MAN WHO WAS THURSDAY: A NIGHTMARE”.</p>
				</li>
				<li>
					<p>If there are other contributors besides the author (for example a translator or illustrator), their names are preceded by “translated by” or “illustrated by”, set in lowercase Sorts Mill Goudy Italic font.</p>
				</li>
				<li>
					<p>Only include the author, translator, and illustrator on the titlepage. Do not include other contributors like writers of introductions or annotators.</p>
				</li>
				<li>
					<p>The titlepage canvas must have a padding of 50px vertically and 100px horizontally. Text must not enter the padding area.</p>
				</li>
				<li>
					<p>The titlepage viewbox width must be exactly 1400px wide.</p>
				</li>
				<li>
					<p>The titlepage viewbox height must <em>precisely fit the titlepage contents, plus 50px padding</em>. Don’t simply edit the template titlepage and leave the viewbox the same; you must customize the viewbox to fit. You can do this by either copying-and-pasting a viewbox from a completed Standard Ebooks ebook that has the same dimensions as yours, or by doing some simple math to calculate the correct height.</p>
				</li>
				<li>
					<p>Title lines:</p>
					<ul>
						<li>
							<p>Title lines are each 80px tall.</p>
						</li>
						<li>
							<p>You may split the title into as many lines as necessary to fit.</p>
						</li>
						<li>
							<p>Title lines are separated by a 20px margin between each line.</p>
						</li>
					</ul>
				</li>
				<li>
					<p>Author lines:</p>
					<ul>
						<li>
							<p>The first author line begins 100px below the last title line.</p>
						</li>
						<li>
							<p>Each author line is 60px tall.</p>
						</li>
						<li>
							<p>If an author line must be split, the next line begins 20px below the previous one.</p>
						</li>
						<li>
							<p>For works with multiple authors, subsequent author lines begin 20px below the last author line.</p>
						</li>
					</ul>
				</li>
				<li>
					<p>Contributor lines (like translator, illustrator):</p>
					<ul>
						<li>
							<p>Contributors are both a “contributor descriptor”, like “translated by”, followed by the name on a new line.</p>
						</li>
						<li>
							<p>The first contributor descriptor line begins 150px below the last author line.</p>
						</li>
						<li>
							<p>Contributor descriptor lines are 40px tall, all lowercase, in the Sorts Mill Goudy Italic font.</p>
						</li>
						<li>
							<p>The contributor name begins 20px below the contributor descriptor line.</p>
						</li>
						<li>
							<p>The contributor name is 40px tall, ALL CAPS, in the League Spartan font.</p>
						</li>
						<li>
							<p>If there is more than one contributor of the same type (like multiple translators), they are listed on one line. If there are two, separate them with AND. If there are more than two, separate them with commas, and AND after the final comma. <a href="/ebooks/hermann-hesse/siddhartha/gunther-olesch_anke-dreher_amy-coulter_stefan-langer_semyon-chaichenets">Example.</a></p>
						<li>
							<p>If there is more than one contributor type (like both a translator and an illustrator), the next contributor descriptor begins 80px after the last contributor name.</p>
						</li>
					</ul>
				</li>
			</ul>
			<h3>Titlepage diagram</h3>
			<figure>
				<img alt="Spacing in a Standard Ebooks titlepage image" src="/images/titlepage-layout.png">
			</figure>
			<aside class="alert">
				<p>Standard Ebooks is a brand-new project&mdash;this manual is a pre-alpha, and much of it is incomplete. If you have a question, need clarification, or run in to an issue not yet covered here, please <a href="https://groups.google.com/forum/#!forum/standardebooks">contact us</a> so we can update this manual.</p>
			</aside>
		</section>
	</article>
</main>
<?= Template::Footer() ?>
