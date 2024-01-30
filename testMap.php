<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div id="map" style="min-width: 100vh; min-height: 100vh;"></div>

    <script>
        (g => {
            var h, a, k, p = "The Google Maps JavaScript API",
                c = "google",
                l = "importLibrary",
                q = "__ib__",
                m = document,
                b = window;
            b = b[c] || (b[c] = {});
            var d = b.maps || (b.maps = {}),
                r = new Set,
                e = new URLSearchParams,
                u = () => h || (h = new Promise(async (f, n) => {
                    await (a = m.createElement("script"));
                    e.set("libraries", [...r] + "");
                    for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                    e.set("callback", c + ".maps." + q);
                    a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                    d[q] = f;
                    a.onerror = () => h = n(Error(p + " could not load."));
                    a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                    m.head.append(a)
                }));
            d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
        })({
            key: "AIzaSyAoXfg49XVMibkAH5WSiSnm7JO1TWUTgjg",
            v: "weekly",
            // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
            // Add other bootstrap parameters as needed, using camel case.
        });


        let map;
        // initMap is now async
        async function initMap() {

            var markerPositions = [];

            var req = new XMLHttpRequest();

            req.onreadystatechange = function() {
                if (req.readyState == 4) {
                    if (req.status == 200) {
                        try {
                            const response = JSON.parse(req.responseText);
                            if (response !== '1') {
                                markerPositions = response;
                                initializeMap();
                            } else {
                                alert("There was an error!!");
                            }
                        } catch (error) {
                            console.error(error);
                        }
                    } else {
                        console.error("Failed to fetch marker positions. Status: " + req.status);
                    }
                }
            };

            req.open("GET", "testMapDataLoader.php", true);
            req.send();


            async function initializeMap() {
                // Request libraries when needed, not in the script tag.
                const {
                    Map
                } = await google.maps.importLibrary("maps");
                const {
                    AdvancedMarkerElement
                } = await google.maps.importLibrary("marker");
                // Short namespaces can be used.
                map = new Map(document.getElementById("map"), {
                    center: {
                        lat: 7.0000,
                        lng: 80.0000
                    },
                    zoom: 10,
                    mapId: "DEMO_MAP_ID",
                });

                markerPositions.forEach(position => {
                    const marker = new AdvancedMarkerElement({
                        map: map,
                        position: {
                            lat: parseFloat(position.lat),
                            lng: parseFloat(position.lng)
                        },
                        title: position.title,
                    });
                });
            }
        }

        initMap();
    </script>
</body>

</html>