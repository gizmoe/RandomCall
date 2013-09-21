<?php
  
  function convertSyn($name){
	  $name=strtolower($name);
	  switch($name){
	      case ("alabama"):
	      return "AL";
	      break;
	      case("alaska"):
	      return "AK";
	      break;
	      case ("arizona"):
	      return "AZ";
	      break;
	      case ("arkansas"):
	      return "AR";
	      break;
	      case ("california"):
	      return "CA";
	      break;
	      case ("colorado"):
	      return "CO";
	      break;
	      case ("connecticut"):
	      return "CT";
	      break;
	      case ("delaware"):
	      return "DE";
	      break;
	      case ("florida"):
	      return "FL";
	      break;
	      case ("georgia"):
	      return "GA";
	      break;
	      case ("hawaii"):
	      return "HI";
	      break;
	      case ("idaho"):
	      return "ID";
	      break;
	      case ("illinois"):
	      return "IL";
	      break;
	      case ("indiana"):
	      return "IN";
	      break;
	      case ("iowa"):
	      return "IA";
	      break;
	      case ("kansas"):
	      return "KS";
	      break;
	      case ("kentucky"):
	      return "KY";
	      break;
	      case ("louisiana"):
	      return "LA";
	      break;
	      case ("maine"):
	      return "ME";
	      break;
	      case ("maryland"):
	      return "MD";
	      break;
	      case ("massachusetts"):
	      return "MA";
	      break;
	      case ("michigan"):
	      return "MI";
	      break;
	      case ("minnesota"):
	      return "MN";
	      break;
	      case ("mississippi"):
	      return "MS";
	      break;
	      case ("missouri"):
	      return "MO";
	      break;
	      case ("montana"):
	      return "MN";
	      break;
	      case ("nebraska"):
	      return "NE";
	      break;
	      case ("nevada"):
	      return "NV";
	      break;
	      case ("hampshire"):
	      return "NH";
	      break;
	      case ("jersey"):
	      return "NJ";
	      break;
	      case ("mexico"):
	      return "NM";
	      break;
	      case ("york"):
	      return "NY";
	      break;
	      case ("carolina"):
	      return array("NC","SC");
	      break;
	      case ("dakota"):
	      return array("ND","SD");
	      break;
	      case ("ohio"):
	      return "OH";
	      break;
	      case ("oklahoma"):
	      return "OK";
	      break;
	      case ("oregon"):
	      return "OR";
	      break;
	      case ("pennsylvania"):
	      return "PA";
	      break;
	      case ("rhode"):
	      return "RI";
	      break;
	      case ("tennessee"):
	      return "TN";
	      break;
	      case ("texas"):
	      return "TX";
	      break;
	      case ("utah"):
	      return "UT";
	      break;
	      case ("vermont"):
	      return "VT";
	      break;
	      case ("virginia"):
	      return array("VA","WV");
	      break;
	      case ("washington"):
	      return "WA";
	      break;
	      case ("wisconsin"):
	      return "WI";
	      break;
	      case ("wyoming"):
	      return "WY";
	      break;
	      
	      default:
		return null;
	      break;
	  
	  }
  }
  
  error_reporting  (E_ALL);
  ini_set ('display_errors', true);
 $mysql_host = "mysql14.000webhost.com";
$mysql_database = "a3696617_web";
$mysql_user = "a3696617_root";
$mysql_password = "mecham12";
mysql_connect($mysql_host , $mysql_user, $mysql_password ) or die(mysql_error());
mysql_select_db($mysql_database)  or die(mysql_error());
  global $raw_results;
  global $finalCorrection;
  global $finalDisp;
  $bool=true;
  $correctionText=array();
  $text=$_GET['CitySearch'];
  $text=htmlspecialchars($text);
  $text=mysql_real_escape_string($text);
  $text=str_replace(","," ",$text);
  $text=trim($text,"\n-,.&`~+=?/><{}][|\\_^%$#@!)(*");
if(strlen($text)>=2){
  //echo "Trimed Text: ".$text;
  $strings=preg_split('/\s+/',$text);
  $size=count($strings);
  //echo "<br> Size: ";
  //echo $size;
  //echo "<br>";
  if($size>=20){
    echo "Invalid Query! :-/";
  }else{
    $query="Select * from Cities where MATCH(city,state,counties) AGAINST('";
    $keywords=array("anchorage","municipality","ak","fairbanks","north","star","borough","badger","bethel","census","area","chena","ridge","college","matanuska-susitna","gateway","kenai","peninsula","homer","juneau","city","and","kalifornsky","ketchikan","knik-fairview","kodiak","island","lakes","meadow","palmer","sitka","steele","creek","sterling","tanaina","wasilla","shelby","county","alabaster","al","marshall","albertville","tallapoosa","alexander","covington","andalusia","calhoun","anniston","cullman","arab","limestone","athens","escambia","atmore","etowah","attalla","lee","auburn","baldwin","bay","minette","jefferson","bessemer","birmingham","boaz","brewton","brook","highland","chilton","calera","center","point","mobile","chickasaw","talladega","childersburg","clanton","clay","dale","daleville","daphne","morgan","decatur","marengo","demopolis","henry","houston","dothan","coffee","enterprise","barbour","eufaula","fairfield","fairhope","lauderdale","florence","foley","forestdale","dekalb","fort","payne","
fultondale","gadsden","gardendale","glencoe","grayson","valley","butler","greenville","gulf","shores","guntersville","marion","hamilton","hartselle","madison","harvest","helena","homewood","hoover","hueytown","huntsville","irondale","clarke","jackson","jacksonville","walker","jasper","chambers","lanett","st","clair","leeds","lincoln","meadowbrook","meridianville","midfield","autauga","elmore","millbrook","monroe","monroeville","montevallo","montgomery","moody","moores","mill","mountain","colbert","muscle","shoals","tuscaloosa","northport","blount","oneonta","opelika","opp","orange","beach","oxford","ozark","pelham","pell","russell","phenix","pike","road","pinson","pleasant","grove","prattville","prichard","rainbow","randolph","roanoke","robertsdale","franklin","russellville","saks","saraland","satsuma","scottsboro","dallas","selma","sheffield","smiths","station","southside","spanish","sylacauga","tarrant","theodore","tillmans","corner","troy","trussville","tuscumbia","macon","tuskegee","vestavia","hills","
wetumpka","crawford","alma","ar","clark","arkadelphia","independence","batesville","white","beebe","benton","bella","vista","saline","bentonville","carroll","berryville","mississippi","blytheville","bryant","lonoke","cabot","ouachita","camden","centerton","johnson","clarksville","faulkner","conway","ashley","crossett","sevier","de","queen","east","end","union","el","dorado","washington","farmington","fayetteville","francis","forrest","sebastian","smith","greenwood","boone","harrison","cleburne","heber","springs","phillips","helena-west","hempstead","hope","garland","hot","village","pulaski","craighead","jonesboro","little","rock","lowell","columbia","magnolia","spring","malvern","crittenden","maumelle","polk","mena","drew","monticello","morrilton","baxter","home","newport","osceola","greene","paragould","pine","bluff","pocahontas","rogers","pope","searcy","sherwood","siloam","springdale","arkansas","stuttgart","miller","texarkana","poinsett","trumann","van","buren","bradley","warren","west","memphis","hall","
cross","wynne","maricopa","anthem","az","pinal","apache","junction","arizona","avondale","pima","avra","cochise","benson","bisbee","buckeye","mohave","bullhead","yavapai","camp","verde","casa","grande","casas","adobes","catalina","foothills","cave","chandler","chino","coolidge","corona","tucson","cottonwood","coconino","doney","park","douglas","drexel","heights","mirage","eloy","flagstaff","flowing","wells","yuma","fortuna","fountain","gilbert","glendale","gila","globe","gold","canyon","golden","goodyear","green","guadalupe","navajo","holbrook","kayenta","kingman","lake","havasu","litchfield","marana","mesa","new","kingman-butler","river","santa","cruz","nogales","oro","page","paradise","paulden","payson","peoria","phoenix","picture","rocks","prescott","rincon","rio","rico","saddlebrooke","graham","safford","sahuarita","san","luis","tan","scottsdale","sedona","show","low","sierra","southeast","snowflake","somerton","south","summit","sun","surprise","tanque","tempe","three","points","tolleson","tuba","estates"
,"vail","valencia","of","oak","wickenburg","williamson","winslow","youngtown","los","angeles","acton","ca","bernardino","adelanto","agoura","alameda","contra","costa","alamo","albany","alhambra","aliso","viejo","alondra","diego","alpine","nevada","alta","altadena","clara","alum","napa","american","anaheim","shasta","anderson","sacramento","antelope","antioch","apple","aptos","arcadia","humboldt","arcata","arden-arcade","obispo","arroyo","artesia","kern","arvin","ashland","atascadero","mateo","atherton","merced","atwater","placer","joaquin","august","kings","avenal","avocado","azusa","bakersfield","riverside","banning","barstow","bear","beaumont","bell","gardens","bellflower","belmont","ben","lomond","solano","benicia","berkeley","bermuda","dunes","beverly","big","blackhawk","bloomington","blythe","madera","bonadelle","ranchos-madera","ranchos","bonita","bostonia","sonoma","boyes","imperial","brawley","brea","brentwood","stanislaus","bret","harte","buena","burbank","burlingame","calabasas","calexico","
california","calimesa","calipatria","calistoga","ventura","camarillo","cambria","cameron","pendleton","campbell","capitola","carlsbad","carmichael","barbara","carpinteria","carson","oro-mount","helix","castaic","castro","monterey","castroville","cathedral","ceres","cerritos","charter","cherry","cherryland","butte","chico","chowchilla","chula","citrus","claremont","clayton","clearlake","cloverdale","fresno","clovis","coachella","coalinga","colton","colusa","commerce","compton","concord","centre","corcoran","tehama","corning","coronado","marin","corte","cotati","coto","caza","country","club","covina","del","norte","crescent","crestline","cudahy","culver","cupertino","tulare","cutler","cypress","daly","dana","danville","yolo","davis","aire","delano","delhi","desert","palms","diamond","bar","dinuba","discovery","dixon","dos","palos","downey","duarte","dublin","durham","earlimart","hemet","la","mirada","palo","alto","pasadena","porterville","rancho","dominguez","gabriel","eastvale","cajon","centro","cerrito","
granada","monte","paso","robles","segundo","sobrante","elk","elverta","emeryville","encinitas","escalon","escondido","eucalyptus","eureka","exeter","fair","oaks","fairfax","fairview","fallbrook","farmersville","fillmore","firebaugh","florence-graham","florin","folsom","fontana","foothill","farms","mendocino","bragg","irwin","foster","fowler","fremont","french","fruitridge","pocket","fullerton",
    "galt","garden","acres","gardena","garnet","gilroy","glen","avon","glendora","goleta","gonzales","good","grand","terrace","granite","grass","greenacres","greenfield","gridley","grover","gustine","hacienda","half","moon","hanford","hawaiian","hawthorne","hayward","healdsburg","hercules","hermosa","hesperia","hidden","hillsborough","hilmar-irwin","benito","hollister","holtville","homeland","hughson","huntington","huron","indian","indio","inglewood","interlaken","amador","ione","irvine","isla","jamul","joshua","tree","kensington","kentfield","kerman","keyes","king","kingsburg","canada","flintridge","crescenta-montrose","habra","palma","presa","puente","quinta","riviera","verne","ladera","ranch","lafayette","laguna","niguel","woods","arrowhead","elsinore","forest","mathews","lakeland","lakeside","lakewood","lamont","lancaster","larkfield-wikiup","larkspur","las","flores","lathrop","lawndale","lemon","hill","lemoore","lennox","yuba","linda","lindsay","sutter","live","livermore","livingston","lodi","loma","
lomita","lompoc","long","loomis","alamitos","altos","banos","gatos","osos","lucas","valley-marinwood","lucerne","lynwood","magalia","malibu","mono","mammoth","manhattan","manteca","marina","rey","martinez","marysville","mayflower","maywood","mcfarland","mckinleyville","mead","mecca","mendota","menifee","menlo","mentone","midway","millbrae","milpitas","mira","mission","modesto","monrovia","montclair","montebello","montecito","moorpark","moraga","moreno","morro","house","view","murrieta","muscoy","national","newark","newman","nipomo","norco","highlands","tustin","norwalk","novato","nuevo","oakdale","oakland","oakley","oasis","oceano","oceanside","oildale","ojai","old","fig","olivehurst","ontario","cove","orangevale","orcutt","orinda","glenn","orland","orosi","oroville","oxnard","pacific","pacifica","palermo","palm","palmdale","verdes","paramount","parkway","parlier","patterson","pedley","perris","petaluma","phelan","pico","rivera","piedmont","pinole","pinon","pismo","pittsburg","placentia","placerville","
pleasanton","pleasure","plumas","pollock","pines","pomona","port","hueneme","poway","prunedale","quartz","ramona","calaveras","cordova","cucamonga","murieta","margarita","red","redding","redlands","redondo","redwood","reedley","rialto","richmond","ridgecrest",
    "mar","ripon","riverbank","rocklin","rodeo","rohnert","rolling","rosamond","rosedale","roseland","rosemead","rosemont","roseville","rossmoor","rowland","rubidoux","salida","salinas","anselmo","bruno","buenaventura","carlos","clemente","dimas","fernando","francisco","jacinto","jose","juan","capistrano","leandro","lorenzo","marcos","marino","martin","pablo","rafael","ramon","sanger","ana","clarita","fe","maria","monica","paula","rosa","santee","saranap","saratoga","sausalito","scotts","seal","seaside","sebastopol","shafter","madre","signal","silver","simi","solana","soledad","solvang","soquel","gate","tahoe","whittier","stanford","stanton","stevenson","stockton","strawberry","suisun","sunnyslope","sunnyvale","lassen","susanville","taft","tamalpais-homestead","tara","tehachapi","temecula","temescal","temple","templeton","thermalito","thousand","tiburon","topanga","torrance","tracy","truckee","turlock","twentynine","ukiah","university","upland","vacaville","valinda","valle","vallejo","vandenberg","
victorville","park-windsor","villa","vincent","vineyard","visalia","walnut","wasco","waterford","watsonville","hollywood","whittier-los","nietos","westlake","westminster","westmont","wildomar","williams","willowbrook","willows","wilton","windsor","winter","winters","winton","woodcrest","woodlake","woodland","woodside","yorba","siskiyou","yreka","yucaipa","yucca","air","force","academy","co","alamosa","applewood","adams","arvada","pitkin","aspen","arapahoe","aurora","eagle","berkley","larimer","weld","berthoud","black","boulder","brighton","broomfield","brush","canon","garfield","carbondale","castle","centennial","cimarron","clifton","colorado","columbine","montezuma","cortez","moffat","craig","dakota","delta","denver","derby","dove","plata","durango","edgewater","edwards","englewood","erie","estes","evans","evergreen","fairmount","federal","firestone","collins","lupton","frederick","fruita","fruitvale",
    "gleneagle","glenwood","greeley","gunbarrel","gunnison","gypsum","johnstown","ken","caryl","otero","junta","prowers","lamar","littleton","lone","longmont","louisville","loveland","manitou","milliken","montrose","monument","northglenn","orchard","parker","pueblo","rifle","roxborough","chaffee","security-widefield","shaw","sheridan","sherrelwood","routt","steamboat","logan","stonegate","stratmoor","superior","the","pinery","thornton","animas","trinidad","twin","welby","wellington","wheat","teller","woodmoor","haven","ansonia","ct","branford","bridgeport","hartford","bristol","cheshire","london","conning","towers","nautilus","cos","cob","danbury","darien","glastonbury","greenwich","groton","manchester","meriden","middlesex","middletown","milford","naugatuck","britain","newington","norwich","oakville","pawcatuck","portland","windham","putnam","ridgefield","tolland","rockville","shelton","manor","simsbury","southwood","stamford","storrs","stratford","terryville","thompsonville","torrington","trumbull","
wallingford","waterbury","westport","wethersfield","willimantic","locks","winsted","district","dc","brookside","claymont","kent","dover","edgemoor","elsmere","sussex","georgetown","glasgow","hockessin","seaford","smyrna","wilmington","alachua","fl","alafaya","seminole","altamonte","apollo","apopka","desoto","asbury","duval","atlantic","auburndale","miami-dade","aventura","azalea","pinellas","bardmoor","bartow","harbor","islands","pasco","bayonet","manatee","bayshore","beacon","square","sarasota","bee","bellair-meadowbrook","belle","glade","isle","bellview","bithlo","bloomingdale","boca","raton","boynton","bradenton","brandon","brent","broward","broadview","hernando","brooksville","brownsville","callaway","brevard","cape","canaveral","coral","carrollwood","casselberry","celebration","cheval","clearwater","clermont","hendry","clewiston","cocoa","coconut","combee","settlement","cooper","gables","walk","okaloosa","crestview","crystal","dade","dania","davie","volusia","daytona","debary","deerfield","deltona","
destin","doctor","doral","dunedin","lake-orient","milton","egypt","lake-leto","elfers","charlotte","ensley","estero","eustis","fellsmere","fern","nassau","fernandina","ferry","pass","fish","hawk","fleming","floral","florida","meade","myers","lucie","pierce","walton","fountainebleau","four","corners","johns","fruit","fruitville","fuller","fussels","gainesville","gibsonton","gifford","gladeview","glenvar","collier","glades","goldenrod","gonzalez","goulds","groveland","breeze","gulfport","haines","hallandale","heathrow","hialeah","high","hobe","sound","holiday","holly","homestead","homosassa","horizon","hudson","hunters","hutchinson","immokalee","harbour","indiantown","inverness","inwood","iona","islamorada,","ives","jan","phyl","jasmine","jensen","jupiter","kathleen","kendale","kendall","key","biscayne","largo","keystone","kissimmee","lady","alfred","lorraine","magdalene","mary","wales","worth","land","o'","lantana","lauderdale-by-the-sea","lauderhill","laurel","lealman","lecanto","leesburg","lehigh","leisure",
"lighthouse","suwannee","lockhart","longboat","longwood","lutz","lynn","baker","macclenny","maitland","mango","marathon","marco","margate","marianna","mascotte","mcgregor","medulla","melbourne","merritt","miami","micco","middleburg","mims","minneola","miramar","mount","dora","myrtle","naples","naranja","village-ratliff","navarre","neptune","richey","niceville","weeki","wachee","northdale","oakleaf","plantation","ocala","ocean","ocoee","odessa","ojus","okeechobee","oldsmar","olympia","opa-locka","orlando","orlovista","ormond","ormond-by-the-sea","osprey","oviedo","pace","pahokee","palatka","flagler","coast","river-clair","mel","palmetto","panama","parkland","pebble","pelican","pembroke","pensacola","taylor","perry","pinecrest","pinewood","plant","poinciana","pompano","salerno","john","princeton","progress","punta","gorda","quincy","pinar","riverview","rockledge","rotonda","royal","ruskin","safety","samsula-spruce","sanford","sanibel","satellite","sebring","seffner","shady","siesta","sky","highpoint","patrick",
"venice","southchase","southgate","southwest","ranches","springfield","augustine","cloud","pete","petersburg","bradford","starke","stuart","sugarmill","sunny","isles","sunrise","sunset","surfside","sweetwater","leon","tallahassee","tamarac","tamiami","tampa","tarpon","tavares","tequesta","acreage","crossings","hammocks","sumter","villages","thonotosassa","timber","titusville","town","'n'","treasure","trinity","upper","lagoon","valparaiso","valrico","vero","viera","villas","wahneta","warm","mineral","warrington","hardee","wauchula","wedgefield","wekiwa","wesley","chapel","perrine","samoset","corridor","westchase","westchester","westgate","weston","westview","westwood","wildwood","williamsburg","willow","manors","wimauma","world","golf","wright","yulee","zephyrhills","cobb","acworth","ga","cook","adel","dougherty","fulton","alpharetta","americus","athens-clarke","atlanta","barrow","gwinnett","augusta-richmond","austell","bainbridge","barnesville","belvedere","braselton","haralson","bremen","glynn","brunswick","
buford","grady","cairo","gordon","mitchell","camilla","candler-mcafee","cherokee","canton","carrollton","cartersville","cedartown","centerville","chamblee","clarkston","bleckley","cochran","muscogee","columbus","conley","rockdale","conyers","crisp","cordele","newton","forsyth","cumming","chattahoochee","cusseta-chattahoochee","lumpkin","dahlonega","paulding","whitfield","dalton","dock","doraville","douglasville","druid","laurens","duluth","dunwoody","eatonton","fairburn","fayette","fitzgerald","flowery","branch","catoosa","oglethorpe","peach","chatham","gresham","spalding","griffin","grovetown","hampton","hapeville","liberty","hinesville","butts","wayne","jesup","kennesaw","kingsland","troup","lagrange","lawrenceville","lilburn","lithia","locust","loganville","lovejoy","mableton","bibb","jones","marietta","mcdonough","telfair","mcrae","milledgeville","morrow","colquitt","moultrie","coweta","newnan","norcross","panthersville","peachtree","pooler","wentworth","powder","redan","bryan","effingham","riverdale","
floyd","rome","roswell","sandersville","sandy","savannah","scottdale","skidaway","snellville","marys","simons","bulloch","statesboro","stockbridge","stone","sugar","suwanee","emanuel","swainsboro","sylvester","upson","thomaston","thomas","thomasville","mcduffie","thomson","tift","tifton","stephens","toccoa","tucker","tyrone","lowndes","valdosta","toombs","vidalia","rica","vinings","warner","robins",
    "ware","waycross","burke","waynesboro","whitemarsh","winder","woodstock","honolulu","ahuimanu","hi","aiea","ewa","gentry","maui","haiku-pauwela","halawa","hawaii","hickam","housing","hilo","holualoa","kahului","kailua","kalaoa","kaneohe","kauai","kapaa","kapolei","kihei","kula","lahaina","laie","lihue","maili","makaha","makakilo","makawao","mililani","mauka","nanakuli","napili-honokowai","pointe","pearl","pukalani","kunia","schofield","barracks","wahiawa","waianae","waihee-waiehu","waikele","waikoloa","wailea","wailua","homesteads","wailuku","waimalu","waimanalo","waimea","waipahu","waipio","loch","estate","kossuth","algona","ia","altoona","story","ames","anamosa","ankeny","cass","scott","bettendorf","des","moines","burlington","cedar","falls","linn","rapids","appanoose","charles","clarinda","cerro","gordo","clear","clinton","clive","coralville","pottawattamie","council","bluffs","creston","davenport","witt","denison","dubuque","eldridge","emmet","estherville","webster","dodge","mills","grimes","
poweshiek","grinnell","harlan","hiawatha","buchanan","indianola","iowa","hardin","johnston","keokuk","knoxville","plymouth","le","mars","delaware","maquoketa","marshalltown","mason","muscatine","oelwein","sioux","mahaska","oskaloosa","wapello","ottumwa","pella","o'brien","sheldon","shenandoah","woodbury","spencer","storm","urbandale","vinton","waterloo","waukee","bremer","waverly","winterset","bonneville","ammon","id","bingham","blackfoot","ada","boise","cassia","minidoka","burley","caldwell","bannock","chubbuck","kootenai","coeur","d'alene","gem","emmett","blaine","hailey","hayden","idaho","jerome","kuna","nez","perce","lewiston","meridian","middleton","latah","moscow","nampa","payette","power","pocatello","post","preston","rathdrum","rexburg","rupert","bonner","sandpoint","weiser","dupage","addison","il","kane","mchenry","algonquin","alsip","alton","arlington","will","barrington","bartlett","bartonville","batavia","beardstown","belleville","bellwood","belvidere","bensenville","berwyn","bethalto","blue","
bolingbrook","kankakee","bourbonnais","braidwood","bridgeview","brookfield","buffalo","burr","cahokia","calumet","campton","macoupin","carlinville","carmi","carol","stream","carpentersville","carterville","cary","centralia","centreville","champaign","grundy","channahon","coles","charleston","sangamon","chester","chicago","chillicothe","cicero","clarendon","coal","collinsville","colona","countryside","crest","crestwood","crete","tazewell","creve","vermilion","plaines","dolton","downers","du","quoin","moline","louis","edwardsville","elburn","elgin","elmhurst","elmwood","woodford","evanston","flora","flossmoor","fox","frankfort","stephenson","freeport","gages","knox","galesburg","geneva","genoa","gilberts","carbon","ellyn","glenview","godfrey","grandwood","grayslake","bond","gurnee","hampshire","hanover","harrisburg","harvard","harvey","harwood","hawthorn","hazel","herrin","hickory","highwood","hillsboro","hillside","hinsdale","hoffman","hoopeston","huntley","itasca","jersey","jerseyville","johnsburg","joliet","
justice","kewanee","grange","in","zurich","lakemoor","lansing","salle","lasalle","lemont","libertyville","lincolnshire","lincolnwood","lindenhurst","lisle","lockport","lombard","winnebago","loves","lyons",
    "machesney","macomb","mahomet","manteno","markham","marseilles","maryville","mascoutah","matteson","mattoon","melrose","massac","metropolis","midlothian","milan","minooka","mokena","monee","monmouth","piatt","morris","morton","wabash","carmel","prospect","vernon","zion","mundelein","murphysboro","naperville","lenox","niles","mclean","normal","norridge","northbrook","northfield","northlake","lawn","o'fallon","richland","olney","fields","oswego","ottawa","palatine","christian","pana","edgar","paris","pekin","peru","pinckneyville","plainfield","plano","pontiac","pontoon","poplar","posen","bureau","rantoul","richton","robbins","robinson","ogle","rochelle","whiteside","rockford","rockton","meadows","romeoville","roscoe","roselle","round","salem","sandwich","sauk","savoy","schaumburg","schiller","shiloh","shorewood","silvis","skokie","beloit","holland","staunton","steger","stickney","streamwood","streator","swansea","sycamore","taylorville","tinley","urbana","vandalia","warrenville","iroquois","watseka","
wauconda","waukegan","dundee","western","wheaton","wheeling","wilmette","winfield","winnetka","winthrop","wood","woodridge","yorkville","alexandria","steuben","angola","kalb","hendricks","bargersville","ripley","lawrence","bedford","beech","bluffton","warrick","boonville","brazil","dearborn","bright","brownsburg","charlestown","porter","chesterton","whitley","bartholomew","connersville","crawfordsville","crown","hancock","cumberland","elkhart","dunlap","dyer","ellettsville","tipton","elwood","vanderburgh","evansville","fishers","allen","garrett","gary","grant","gas","goshen","joseph","granger","greencastle","greensburg","griffith","grissom","afb","hammond","blackford","hobart","dubois","huntingburg","indianapolis","jeffersonville","noble","kendallville","howard","kokomo","porte","tippecanoe","seasons","lawrenceburg","lebanon","linton","logansport","martinsville","merrillville","michigan","mishawaka","mooresville","posey","muncie","munster","kosciusko","nappanee","whiteland","noblesville","jennings","notre","
dame","portage","jay","gibson","purdue","rensselaer","rochester","rush","rushville","schererville","scottsburg","sellersburg","seymour","shelbyville","bend","speedway","tell","vigo","terre","haute","vincennes","warsaw","daviess","westfield","westville","yorktown","zionsville","dickinson","abilene","ks","sedgwick","andover","cowley","atchison","augusta","bel","leavenworth","wyandotte","neosho","chanute","coffeyville","colby","concordia","soto","ford","lyon","emporia","eudora","geary","riley","bourbon","finney","gardner","barton","great","ellis","hays","haysville","reno","iola","kansas","leawood","lenexa","seward","liberal","pottawatomie","mcpherson","merriam","sumner","mulvane","olathe","overland","paola","labette","parsons","prairie","pratt","roeland","salina","shawnee","tonganoxie","topeka","ulysses","wichita","ky","boyd","nelson","bardstown","bellevue","berea","bowling","oldham","buckner","campbellsville","muhlenberg","central","cold","corbin","kenton","cynthiana","boyle","dayton","douglass","edgewood","
elizabethtown","erlanger","greenup","flatwoods","francisville","simpson","barren","mercer","harrodsburg","hebron","henderson","bullitt","hillview","hopkinsville","jeffersontown","leitchfield","lexington","lyndon","hopkins","madisonville","graves","mayfield","maysville","middlesborough","rowan","morehead","calloway","murray","jessamine","nicholasville","oakbrook","owensboro","mccracken","paducah","pikeville","radcliff","shepherdsville","shively","somerset","matthews","versailles","winchester","parish","abbeville","rapides","baton","rouge","morehouse","bastrop","lafourche","terrebonne","bayou","cane","plaquemines","chasse","bogalusa","breaux","bridge","broussard","brownfields","carencro","chackbay","bernard","chalmette","claiborne","tammany","acadia","crowley","cut","off","denham","beauregard","deridder","destrehan","ascension","donaldsonville","eden","estelle","landry","eunice","galliano","gardere","gray","gretna","tangipahoa","harahan","houma","inniswold","iberia","jeanerette","kenner","lacombe","calcasieu","
baptist","laplace","larose","leesville","luling","mandeville","mansfield","avoyelles","marksville","marrero","meraux","merrydale","metairie","minden","moss","natchitoches","orleans","place","opelousas","pineville","ponchatoula","prairieville","prien","raceland","rayne","bossier","chute","reserve","ruston","schriever","caddo","shreveport","slidell","springhill","iberville","martinville","rose","sulphur","tallulah","terrytown","thibodaux","timberlane","george","evangeline","ville","platte","waggaman","westwego","woodmere","youngsville","zachary","abington","ma","berkshire","hampden","agawam","essex","amesbury","amherst","worcester","athol","attleboro","barnstable","bliss","suffolk","boston","norfolk","braintree","bridgewater","brockton","brookline","cambridge","chelsea","chicopee","cochituate","danvers","dedham","falmouth","easthampton","everett","fall","fitchburg","foxborough","framingham","gloucester","haverhill","hingham","holyoke","hull","kingston","leominster","longmeadow","lynnfield","malden","marblehead"
,"marlborough","maynard","medfield","medford","methuen","middleborough","nantucket","needham","newburyport","scituate","northampton","northborough","norwood","peabody","pinehurst","pittsfield","reading","revere","saugus","sharon","somerville","yarmouth","southbridge","stoneham","swampscott","taunton","wakefield","walpole","waltham","watertown","wellesley","weymouth","woburn","harford","aberdeen","md","prince","george's","accokeek","adelphi","anne","arundel","annapolis","neck","baltimore","arbutus","arnold","ashton-sandy","ballenger","beltsville","bensville","bethesda","bladensburg","bowie","bowleys","quarters","brandywine","brock","brooklyn","bryans","burtonsville","mary's","calverton","dorchester","claire","carney","catonsville","calvert","chesapeake","chestertown","cheverly","chevy","chase","chillum","clarksburg","cloverly","cockeysville","colesville","crofton","allegany","damascus","darnestown","dundalk","talbot","easton","edgemere","eldersburg","elkridge","cecil","elkton","ellicott","fairland","fairwood",
"fallston","ferndale","forestville","fountainhead-orchard","friendly","frostburg","gaithersburg","garrison","germantown","glassmanor","burnie","glenarden","greenbelt","hagerstown","halfway","hampstead","havre","grace","hillandale","hillcrest","hyattsville","ilchester","jessup","joppatowne","kemp","kettering","arbor","shore","landover","langley","lanham","lansdowne","layhill","linganore","linthicum",
    "lochearn","lutherville","marlboro","marlow","marlton","maryland","mayo","mays","middle","mitchellville","airy","rainier","potomac","odenton","overlea","owings","oxon","parkville","parole","pikesville","randallstown","redland","reisterstown","robinwood","rosaryville","rossville","wicomico","salisbury","savage","scaggsville","seabrook","severn","severna","side","anne's","stevensville","suitland","summerfield","takoma","taneytown","thurmont","timonium","towson","travilah","waldorf","walkersville","westphalia","marsh","woodlawn","androscoggin","me","kennebec","penobscot","bangor","sagadahoc","bath","waldo","belfast","york","biddeford","brewer","aroostook","caribou","ellsworth","gardiner","gorham","kennebunk","orono","presque","rockland","saco","skowhegan","topsham","waterville","westbrook","lenawee","adrian","mi","albion","allendale","gratiot","alpena","washtenaw","ann","battle","genesee","beecher","ionia","belding","berrien","mecosta","saginaw","burton","byron","wexford","cadillac","line","eaton","clawson",
"coldwater","kalamazoo","comstock","northwest","cutlerville","davison","detroit","dowagiac","ingham","eastpointe","eastwood","ecorse","escanaba","plain","fenton","flat","flint","flushing","fraser","freeland","blanc","ledge","grandville","montcalm","grosse","hamtramck","harper","haslett","hillsdale","allegan","holt","houghton","howell","hudsonville","inkster","iron","gogebic","ironwood","marquette","ishpeming","jenison","kentwood","kingsford","lambertville","lapeer","livonia","ludington","manistee","melvindale","menominee","midland","clemens","isabella","muskegon","northview","northville","norton","novi","okemos","shiawassee","owosso","petoskey","romulus","chippewa","sault","ste","marie","shields","southfield","sturgis","swartz","tecumseh","temperance","rivers","traverse","leelanau","trenton","walled","westland","whitmore","wixom","woodhaven","wyoming","ypsilanti","zeeland","freeborn","albert","lea","mn","anoka","ramsey","arden","mower","austin","crow","wing","plaine","beltrami","bemidji","sherburne","
hennepin","brainerd","burnsville","isanti","champlin","carver","chanhassen","chaska","carlton","cloquet","coon","cottage","crookston","becker","eagan","forks","edina","fairmont","falcon","rice","faribault","otter","tail","fergus","fridley","mcleod","ham","hastings","hermantown","hibbing","hugo","koochiching","international","inver","jordan","kasson","goodhue","wabasha","elmo","lakeville","lino","meeker","morrison","mahtomedi","earth","sueur","nicollet","mankato","maple","maplewood","minneapolis","minnetonka","minnetrista","montevideo","moorhead","stevens","mound","mounds","prague","brown","ulm","chisago","paul","otsego","owatonna","prior","renville","richfield","robbinsdale","olmsted","rosemount","stearns","sartell","shakopee","shoreview","anthony","michael","peter","stewartville","stillwater","pennington","thief","vadnais","victoria","virginia","waconia","waite","waseca","kandiyohi","willmar","winona","nobles","worthington","zimmerman","affton","mo","ballwin","barnhart","battlefield","bellefontaine","
neighbors","belton","jack","bolivar","francois","bonne","taney","branson","bridgeton","girardeau","carl","carthage","pemiscot","caruthersville","chesterfield","dardenne","dellwood","peres","desloge","stoddard","dexter","ellisville","ray","excelsior","ferguson","festus","florissant","leonard","gladstone","grain","grandview","ralls","hannibal","harrisonville","hazelwood","cole","joplin","kearney","dunklin","kennett","adair","kirksville","kirkwood","ladue","laclede","lees","lemay","marshfield","nodaway","mehlville","audrain","mexico","moberly","barry","monett","murphy","nixa","normandy","jamestown","olivette","perryville","pevely","raymore","raytown","republic","phelps","rolla","sappington","andrew","pettis","sedalia","shrewsbury","madrid","sikeston","smithville","peters","sullivan","warrensburg","warrenton","webb","groves","weldon","wentzville","plains","willard","ms","amory","panola","biloxi","prentiss","booneville","rankin","brookhaven","hinds","byram","leake","coahoma","clarksdale","cleveland","alcorn","
corinth","copiah","diamondhead","d'iberville","flowood","gautier","leflore","grenada","hattiesburg","horn","sunflower","attala","latimer","winston","mccomb","natchez","olive","pascagoula","petal","neshoba","philadelphia","picayune","pontotoc","ridgeland","tippah","tate","senatobia","southaven","oktibbeha","starkville","tupelo","vancleave","vicksburg","waveland","yazoo","deer","lodge","anaconda-deer","mt","gallatin","belgrade","yellowstone","billings","bozeman","bow","flathead","cascade","lewis",
    "kalispell","lewistown","lockwood","custer","miles","missoula","homes","sidney","whitefish","moore","nc","stanly","albemarle","wake","apex","guilford","archdale","asheboro","buncombe","asheville","pitt","ayden","gaston","boiling","watauga","transylvania","alamance","granville","butner","carolina","carrboro","mecklenburg","cherryville","clemmons","sampson","cabarrus","catawba","conover","cornelius","cullowhee","iredell","davidson","harnett","dunn","rockingham","chowan","edenton","pasquotank","elizabeth","elon","fletcher","rutherford","fuquay-varina","garner","gastonia","gibsonville","goldsboro","greensboro","onslow","hamlet","craven","havelock","vance","hendersonville","huntersville","trail","james","kannapolis","kernersville","dare","kill","devil","stokes","lenoir","kinston","knightdale","norman","scotland","laurinburg","leland","lewisville","lincolnton","robeson","lumberton","mcdowell","marvin","mebane","mint","mocksville","carteret","morganton","morrisville","surry","murraysville","nash","nashville","
bern","ogden","piney","porters","raleigh","reidsville","halifax","edgecombe","rocky","person","roxboro","sawmills","siler","smithfield","southern","stallings","statesville","stokesdale","tarboro","unionville","anson","wadesboro","beaufort","waxhaw","haywood","waynesville","weddington","wendell","whiteville","williamston","wilson","winston-salem","winterville","woodfin","burleigh","bismarck","nd","devils","stark","fargo","stutsman","mandan","ward","minot","barnes","wahpeton","williston","box","alliance","ne","gage","beatrice","sarpy","blair","dawes","chadron","chalco","gering","holdrege","dawson","mccook","otoe","nebraska","omaha","papillion","plattsmouth","ralston","colfax","schuyler","scottsbluff","cheyenne","nh","merrimack","derry","strafford","grafton","keene","belknap","laconia","londonderry","nashua","newmarket","portsmouth","somersworth","hooksett","suncook","absecon","nj","bergen","audubon","avenel","bayonne","beachwood","bellmawr","belmar","bergenfield","berlin","bernardsville","passaic","bogota","
boonton","bound","brigantine","brookdale","browns","budd","may","court","carlstadt","carneys","cliffside","closter","collingswood","colonia","cresskill","dumont","dunellen","eatontown","echelon","emerson","cliffs","fanwood","finderne","florham","fords","forked","dix","freehold","glassboro","knoll","greentree","guttenberg","hackensack","hackettstown","haddon","haddonfield","haledon","hammonton","hasbrouck","heathcote","hightstown","hoboken","city-berkeley","hopatcong","iselin","jamesburg","keansburg","kearny","kenilworth","keyport","kinnelon","mohawk","laurence","leonia","lincroft","linden","lindenwold","linwood","manasquan","manville","matawan","mendham","mercerville","metuchen","milltown","montvale","moorestown-lenola","morganville","morristown","mountainside","mystic","providence","oceanport","tappan","oradell","palisades","palmyra","paramus","paterson","paulsboro","penns","pennsville","perth","amboy","phillipsburg","pitman","pleasantville","pompton","rahway","ramblewood","ramtown","raritan","bank","
ridgewood","ringwood","edge","robertsville","rockaway","rumson","runnemede","sayreville","secaucus","short","somerdale","somers","spotswood","strathmore","succasunna","tenafly","tinton","toms","totowa","saddle","ventnor","vineland","waldwick","wallington","wanaque","watchung","wharton","horse","williamstown","woodbridge","woodcliff","wood-ridge","yardville","yorketown","alamogordo","nm","bernalillo","albuquerque","dona","eddy","aztec","belen","sandoval","bloomfield","chaparral","curry","corrales","luna","deming","eldorado","at","arriba","espanola","mckinley","gallup","cibola","grants","hobbs","kirtland","cruces","miguel","vegas","alamos","chaves","lunas","lovington","roosevelt","portales","ruidoso","shiprock","socorro","sunland","taos","truth","or","consequences","quay","tucumcari","zuni","nv","washoe","elko","churchill","fallon","fernley","gardnerville","incline","lane","laughlin","lemmon","mesquite","moapa","nye","pahrump","sparks","summerlin","whitney","winnemucca","airmont","ny","albertson","amityville","
amsterdam","cayuga","babylon","onondaga","baldwinsville","ballston","spa","bayport","bayville","baywood","dutchess","bellmore","bethpage","chemung","flats","broome","binghamton","blauvelt","bohemia","briarcliff","brockport","bronxville","canandaigua","cedarhurst","moriches","centereach","centerport","islip","cheektowaga","chestnut","chittenango","cohoes","colonie","commack","congers","copiague","coram","cortland","croton-on-hudson","depew","dobbs","chautauqua","dunkirk","farmingdale","schenectady","glenville","massapequa","patchogue","shoreham","eastchester","eggertsville","elmira","elmont","endicott","endwell","fairport","drum","salonga","fredonia","geneseo","seneca","glens","gloversville","plaza","greece","greenlawn","hamburg","hamlin","bays","harris","hartsdale","hastings-on-hudson","hauppauge","haverstraw","herkimer","hewlett","hicksville","ulster","hilton","holtsville","hornell","horseheads","ilion","irondequoit","irvington","tompkins","ithaca","valley-yorktown","jericho","kenmore","kiryas","joel","
lackawanna","mohegan","ronkonkoma","lakeview","larchmont","levittown","niagara","lynbrook","mahopac","malone","malverne","mamaroneck","manhasset","manorhaven","manorville","massena","mastic","mattydale","mechanicstown","mechanicville","medina","melville","merrick","mineola","monsey","ivy","kisco","sinai","nanuet","nesconset","cassel","hyde","paltz","bronx","queens","newburgh","gates","syracuse","tonawanda","wantagh","chenango","nyack","ogdensburg","cattaraugus","olean","oneida","ossining","oyster","peekskill","yates","penn","yan","plainedge","plainview","plattsburgh","jervis","potsdam","poughkeepsie","riverhead","roslyn","rotterdam","rye","salamanca","saranac","sayville","scarsdale","scotchtown","scotia","setauket-east","setauket","shirley","sleepy","hollow","smithtown","solvay","southold","southport","stony","suffern","syosset","tarrytown","thiells","tuckahoe","uniondale","utica","viola","wading","walden","wappingers","warwick","washingtonville","watervliet","westbury","westmere","wheatley","williamsville","
wyandanch","yaphank","yonkers","oh","akron","mahoning","lorain","ashtabula","austintown","barberton","cuyahoga","beavercreek","beckett","bellbrook","sandusky","belpre","bexley","blacklick","ash","boardman","brecksville","bridgetown","brookville","bucyrus","guernsey","canal","canfield","celina","champion","geauga","chardon","cheviot","ross","cincinnati","pickaway","circleville","clyde","columbiana","conneaut",
    "coshocton","covedale","defiance","wert","delphos","dent","tuscarawas","dry","run","liverpool","eastlake","preble","elyria","euclid","fairborn","fairlawn","findlay","finneytown","fostoria","gahanna","galion","girard","licking","darke","groesbeck","groveport","heath","hilliard","howland","hubbard","huber","ironton","kenwood","landen","lima","hocking","lyndhurst","macedonia","mack","madeira","mentor","mentor-on-the-lake","miamisburg","monfort","montrose-ghent","moraine","healthy","napoleon","nelsonville","carlisle","ridgeville","royalton","northgate","northridge","northwood","oakwood","oberlin","oregon","orrville","painesville","parma","pataskala","pepper","perrysburg","pickerington","piqua","scioto","powell","ravenna","reynoldsburg","rittman","rossford","seven","shaker","sharonville","solon","springboro","clairsville","auglaize","steubenville","stow","streetsboro","strongsville","struthers","sylvania","tallmadge","tiffin","tipp","toledo","toronto","trotwood","turpin","twinsburg","uhrichsville","wyandot","
wadsworth","wapakoneta","warrensville","wauseon","westerville","wheelersburg","whitehall","wickliffe","willoughby","willowick","withamsville","wooster","xenia","youngstown","muskingum","zanesville","ok","altus","anadarko","carter","ardmore","osage","bartlesville","oklahoma","bethany","tulsa","wagoner","bixby","kay","blackwell","mcclain","blanchard","broken","arrow","chickasha","choctaw","claremore","washita","cushing","duncan","durant","edmond","canadian","beckham","enid","glenpool","guthrie","texas","guymon","harrah","okmulgee","henryetta","hughes","holdenville","mccurtain","idabel","jenks","comanche","lawton","mcalester","midwest","muskogee","mustang","newcastle","owasso","garvin","pauls","kingfisher","ponca","flore","poteau","mayes","pryor","purcell","sequoyah","sallisaw","sand","sapulpa","skiatook","tahlequah","tuttle","vinita","warr","weatherford","woodward","yukon","aloha","klamath","altamont","clatsop","astoria","beaverton","deschutes","brookings","bull","clackamas","canby","multnomah","coos","
corvallis","creswell","eugene","home-whitford","josephine","happy","hayesville","umatilla","hermiston","hood","keizer","madras","yamhill","mcminnville","milton-freewater","milwaukie","molalla","newberg","oatfield","malheur","crook","prineville","redmond","rockcreek","roseburg","scappoose","silverton","helens","stayton","sutherlin","sweet","talent","dalles","tigard","tillamook","troutdale","tualatin","haven-sylvan","slope","wilsonville","woodburn","beaver","aliquippa","pa","allentown","allegheny","allison","ambler","ambridge","ancient","archbald","westmoreland","bellefonte","berwick","bethlehem","berks","birdsboro","blakely","blandon","bloomsburg","mc","kean","bridgeville","bucks","broomall","canonsburg","carnegie","carnot-moon","shannon","catasauqua","chambersburg","clairton","clarion","clarks","clearfield","coatesville","collegeville","collingdale","dauphin","colonial","connellsville","conshohocken","coraopolis","corry","crafton","croydon","darby","dickson","dormont","downingtown","doylestown","dunmore","
duquesne","stroudsburg","economy","edinboro","ellwood","emmaus","enola","ephrata","luzerne","fairless","farrell","fernway","folcroft","venango","gettysburg","glenolden","glenshaw","glenside","harleysville","hatboro","hazleton","hellertown","hermitage","hershey","hollidaysburg","homeacre-lyndora","horsham","huntingdon","indiana","jeannette","prussia","kulpsville","kutztown","lansdale","latrobe","lehighton","leola","lewisburg","linglestown","lionville","lititz","lock","lower","burrell","mckees","mckeesport","meadville","mechanicsburg","media","millersville","northumberland","monaca","monessen","montgomeryville","moosic","joy","top","munhall","murrysville","nanticoke","nazareth","norristown","harborcreek","oakmont","oil","forge","olyphant","oreland","palmerton","paoli","paxtonia","perkasie","phoenixville","pittsburgh","pittston","plum","meeting","pottstown","schuylkill","pottsville","punxsutawney","quakertown","lion","richboro","ridley","sanatoga","sayre","schlusser","scranton","snyder","selinsgrove","shamokin",
"shanor-northvue","shillington","shippensburg","souderton","lycoming","williamsport","state","steelton","sugarcreek","sunbury","swarthmore","swissvale","swoyersville","tamaqua","trooper","turtle","uniontown","vandergrift","green-green","weigelstown","wescosville","mifflin","wilkes-barre","wilkinsburg","street","woodlyn","wyndmoor","wyomissing","yeadon","ri","cranston","pawtucket","tiverton","westerly","woonsocket","aiken","sc","saluda","batesburg-leesville","bennettsville","spartanburg","kershaw","cayce","pickens","cheraw","clemson","clover","horry","darlington","dentsville","dillon","easley","five","inn","gaffney","gantt","goose","greer","hanahan","hartsville","head","irmo","ladson","wylie","lugoff","mauldin","moncks","murrells","inlet","newberry","edgefield","orangeburg","powdersville",
    "sangaree","sans","souci","oconee","simpsonville","socastee","andrews","summerville","taylors","tega","cay","wade","colleton","walterboro","welcome","woodfield","sd","fourche","elder","minnehaha","beadle","pierre","rapid","spearfish","vermillion","codington","yankton","alcoa","tn","mcminn","atoka","hardeman","chattanooga","hawkins","church","collegedale","collierville","maury","rhea","dyersburg","eagleton","elizabethton","unicoi","erwin","loudon","farragut","goodlettsville","robertson","greenbrier","greeneville","roane","harriman","trousdale","hartsville/trousdale","jonesborough","kingsport","follette","vergne","lynchburg,","weakley","mckenzie","millington","hamblen","juliet","munford","murfreesboro","cocke","nolensville","pigeon","giles","rockwood","sevierville","soddy-daisy","tellico","tullahoma","obion","tx","hidalgo","bexar","aldine","jim","alice","collin","brewster","brazoria","alvin","potter","randall","amarillo","angleton","anna","aransas","nueces","patricio","atascocita","travis","azle","
galveston","bacliff","balch","matagorda","baytown","beeville","bellaire","mclennan","bellmead","benbrook","boerne","fannin","bonham","borger","montague","mcculloch","brady","breckenridge","brenham","wise","briar","terry","brownfield","brownwood","brushy","brazos","buda","burkburnett","burleson","burnet","milam","swift","canutillo","comal","dimmit","carrizo","denton","channelview","childress","cibolo","cinco","cloverleaf","clute","colleyville","hunt","conroe","converse","coppell","coryell","lampasas","copperas","kleberg","corpus","christi","navarro","corsicana","crockett","zavala","dewitt","cuero","dallam","hartley","dalhart","kaufman","rockwall","val","doffing","donna","dumas","duncanville","maverick","edinburg","edna","eidson","campo","elsa","ennis","euless","everman","fabens","farmers","fate","floresville","flower","forney","pecos","gillespie","fredericksburg","friendswood","frisco","cooke","galena","gatesville","gregg","upshur","gladewater","young","granbury","grapevine","greatwood","gun","barrel","haltom"
,"harker","harlingen","helotes","waller","rusk","deaf","hereford","hewitt","hitchcock","hondo","hornsby","humble","hurst","hutchins","hutto","ingleside","irving","jollyville","katy","keller","kennedale","winkler","kermit","kerr","kerrville","kilgore","killeen","llano","kingsville","kirby","kyle","feria","homa","marque","lackland","lacy-lakeview","lago","bandera","lakehills","lakeway","lamesa","laredo","league","leander","hockley","levelland","elm","lamb","littlefield","longview","fresnos","lubbock","angelina","lufkin","manvel","marble","marlin","mcallen","mckinney","mercedes","mexia","mila","doce","pinto","missouri","monahans","titus","bailey","muleshoe","murillo","nacogdoches","navasota","nederland","braunfels","territory","ector","palestine","palmview","pampa","pearland","frio","pearsall","pecan","reeves","perezville","ochiltree","perryton","pflugerville","pharr","hale","atascosa","arthur","isabel","lavaca","neches","garza","progreso","prosper","willacy","raymondville","rendon","richardson","starr","
robstown","rockport","roma","rosenberg","rowlett","royse","sachse","tom","angelo","antonio","elizario","schertz","seagoville","sealy","seguin","gaines","sherman","sienna","silsbee","sinton","slaton","scurry","southlake","stafford","erath","stephenville","nolan","terrell","colony","woodlands","timberwood","tomball","trophy","tyler","universal","uvalde","wilbarger","vidor","waco","waxahachie","weslaco","whitehouse","willis","windcrest","woodway","yoakum","zapata","utah","ut","fork","salt","bluffdale","bountiful","brigham","draper","enoch","sanpete","ephraim","weber","farr","tooele","grantsville","harrisville","wasatch","herriman","holladay","hooper","hurricane","cache","hyrum","ivins","kaysville","kearns","layton","lehi","lindon","magna","mapleton","midvale","millcreek","moab","juab","nephi","nibley","orem","price","provo","riverton","duchesne","roy","santaquin","snyderville","springville","stansbury","taylorsville","tremonton","uintah","vernal","abingdon","va","annandale","aquia","loudoun","ashburn","bailey's"
,"crossroads","bensley","gap","blacksburg","bluefield","bon","brambleton","brandermill","broadlands","william","buckhall","cascades","henrico","chamberlayne","chantilly","charlottesville","christiansburg","crosspointe","crozet","culpeper","dranesville","dumbarton","dumfries","loring","ettrick","edward","farmville","fishersville","floris","belvoir","franconia","farm","front","galax","greenbriar","groveton","harrisonburg","herndon","botetourt","hollins","hollymead","hopewell","hybla","idylwood","independent","innsbrook","kingstowne","barcroft","fluvanna","lincolnia","lorton","lowes","lynchburg","manassas","mantua","smyth","marumsco","mcnair","mechanicsville","merrifield","neabsco","fauquier","news","oakton","pimmit","poquoson","purcellville","radford","reston","richlands","sandston","pump","wight","riding","strasburg","stuarts","draft","sudley","sugarland","timberlake","triangle","tysons","vienna","wolf","trap","wyndham","wythe","wytheville","yorkshire","barre","vt","bennington","brattleboro","chittenden","
middlebury","montpelier","rutland","albans","caledonia","johnsbury","winooski","grays","wa","spokane","airway","snohomish","alderwood","skagit","anacortes","artondale","kitsap","base","ground","whatcom","bellingham","birch","bonney","bothell","boulevard","bremerton","brier","bryn","mawr-skyway","burien","camas","chehalis","asotin","heights-vineland","walla","connell","dupont","duvall","renton","wenatchee","eastmont","edmonds","kittitas","ellensburg","enumclaw","way","felida","fife","finley","fircrest","frederickson","gig","yakima","dell","hoquiam","inglewood-finn","issaquah","cowlitz","kelso","kennewick","kingsgate","kirkland","klahanie","thurston","lacey","morton-berrydale","tapps","lynden","lynnwood","maltby","martha","moses","mountlake","mukilteo","orchards","orting","othello","otis","orchards-east","parkwood","picnic","clallam","townsend","poulsbo","prosser","whitman","pullman","puyallup","salmon","sammamish","seatac","seattle","sedro-woolley","selah","sequim","shoreline","firs","silverdale","snoqualmie",
"spanaway","stanwood","steilacoom","sudden","sunnyside","tacoma","tanglewilde","toppenish","tracyton","tukwila","tumwater","hill-novelty","vashon","wapato","washougal","chelan","clarkston-highland","highway","wollochet","woodinville","yelm","allouez","wi","eau","langlade","antigo","outagamie","appleton","bayfield","ashwaubenon","baraboo","dam","waushara","waukesha","milwaukee","racine","walworth","ozaukee","cedarburg",
    "dane","pere","deforest","delafield","delavan","edgerton","elkhorn","fond","lac","atkinson","greendale","hales","crosse","holmen","croix","janesville","kaukauna","kenosha","kimberly","kronenwetter","hallie","manitowoc","marinette","mayville","menasha","menomonee","menomonie","mequon","merrill","monona","horeb","mukwonago","muskego","neenah","waupaca","oconomowoc","onalaska","oshkosh","pewaukee","platteville","plover","sheboygan","chien","reedsburg","rhinelander","rib","barron","rothschild","shawano","slinger","sparta","stoughton","door","sturgeon","sturtevant","suamico","tichigan","tomah","two","verona","waunakee","waupun","wausau","wauwatosa","allis","whitewater","wind","wisconsin","beckley","wv","monongalia","buckhannon","kanawha","cheat","lanes","dunbar","elkins","cabell","keyser","martinsburg","morgantown","moundsville","wetzel","nitro","parkersburg","pea","teays","brooke","weirton","ohio","natrona","casper","wy","laramie","cody","uinta","gillette","teton","lander","ranchettes","rawlins","washakie","
worland","alabama","alaska","arizona","arkansas","california","colorado","connecticut","delaware","florida","georgia","hawaii","idaho","illinois","indiana","iowa","kansas","kentucky","louisiana","maine","maryland","massachusetts","michigan","minnesota","mississippi","missouri","montana","mebraska","nevada","hampshire","jersey","new","mexico","york","north","carolina","dakota","ohio","oklahoma","oregon","pennsylvania","rhode","island","south","tennessee","texas","utah","vermont","virginia","washington","west","virginia","wisconsin","wyoming"
    );
    
    
  
    foreach($strings as $s){
      $closestWord;
      $val=1000000000;
      
      $r=convertSyn($s);
      if($r!=null){
	if(is_array($r)){
	  foreach($r as $m){
	    $query.=" ".$m;
	  }
	}else{
	  $query.=" ".$r;
	}
      }
      
      foreach($keywords as $t){
	$v=levenshtein($s,$t);
	if($v<$val){
	  $val=$v;
	  $closestWord=$t;
	  if($val==0){
	    break;
	  }
	}
      }
      
      if($val==0){
	$query.=" ".$closestWord;
      }else{
	$bool=false;
      }
      array_push($correctionText,$closestWord);
    }
    $query.="')";
    
    
    if($bool==false){
      $totalSize=count($correctionText);
      for($i=0;$i<$totalSize;$i++){
	  $finalCorrection.=$correctionText[$i];
	  $finalDisp.=$correctionText[$i]." ";
	  if($i+1<$totalSize){
	     $finalCorrection.="+";
	  }
	  
	}
    }
    
      
    // echo $inaccuratequery;
      //echo "<br>";
    echo $query;
    $raw_results=mysql_query($query) or die(mysql_error());
  
  }//end else
  
  
}else{
  echo "No results :-/";
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>City Search</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />	
	<style type="text/css"> 
    #list2 { height: auto !important;
	     height: 100%;
	     background: repeat-y white; 
	    }
	
    
    </style>
</head>

<body>
	<div id="header">
		
	  <div id="navigation">
			<ul>
			      
				<li><a href="index.html">Home</a></li>
				<li><a href="index.html">About us</a></li>
				<li><a href="index.html">Support</a></li>
				<li><a href="index.html">Forum</a></li>
				<li><a href="index.html">Contact</a></li>
			</ul>
		</div>
		<div id="search">
			<form action="search.php" method="GET">
				<input type="text" name="CitySearch" value="Find City" class="txtfield" onblur="javascript:if(this.value==''){this.value=this.defaultValue;}" onfocus="javascript:if(this.value==this.defaultValue){this.value='';}" />
				<input type="submit" value="Search" class="button" />
			</form>
		</div>
	</div> <!-- /#header -->
	<div id="contents">
	  <br>
	  <br>
	  <center>
	  <div id="list2">
		  <ul>
		      <?php
		      $i=0;
		      echo "<h1> SEARCHED: ".$text."</h1><br>";
		      if($bool==false){
			  echo "<p> Did you mean <a href=search.php?CitySearch=".$finalCorrection.">";
			  echo $finalDisp."</a></p><br>";
			}
		      
		      
		      if(mysql_num_rows($raw_results)>0){
			while($results = mysql_fetch_array($raw_results)){
			  echo "<li><a href=\"searchResult.php?id=".$results['id']."\">".$results['city']." </a> <br>";
			  echo "<p align=\"Center\">".$results['state'].", ".$results['counties']."</p>";
			  echo "<br>";
			  $i++;
			  if($i>100){
			    break;
			  }
			}
		      
		      }else{
			echo "<p> NO RESULTS!!!</p><br>";
		      
		      }
		      
		      ?>
		  </li>
	      </ul> 
	  </div>
	  </center>
    </div> 
	
	<div id="footer">

		
		
	</div> <!-- /#footer -->
</body>
</html>