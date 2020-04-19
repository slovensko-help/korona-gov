var api_url='https://mojeezdravie.nczisk.sk/api/';
var api_v1_url=api_url+'v1/';

function addCircles(svg, map, markers, type, scaleFactor) {
    svg.selectAll("myCircles")
        .data(markers)
        .enter()
        .append("circle")
        .attr("cx", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).x })
        .attr("cy", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).y })
        .attr("r", function(d){
            var radius = +d.daily_capacity * scaleFactor;
            return radius;
        })
        .attr("stroke-width", 0)
        .attr("fill-opacity", 1)
        .attr("fill-opacity", 1)
        .attr("class", type);
}

function addTooltips(markers, map, scaleFactor) {

    let format_addr=i=>{
        let _=[];
        if(i.zip_code)_.push(i.zip_code);
        if(i.city)_.push(i.city);
        i.formatted_address=_.join(' ');
        _=[];
        if(i.street_name)_.push(i.street_name);
        if(i.street_number)_.push(i.street_number);
        _=[_.join(' ')];
        if(i.formatted_address)_.push(i.formatted_address);
        i.formatted_address=_.join(', ');
        return i.formatted_address+'<br/>';
    }

    for (var i = 0; i < markers.length; i++) {
        var m = markers[i];
        var radius = +m.daily_capacity * scaleFactor;
        if (radius < 5)radius = 5;

        L.circleMarker([m.lat, m.long], { color: m.css_color_rgb?m.css_color_rgb:'#5BC859', radius: radius }).addTo(map).bindTooltip('<strong>' + m.title +  '</strong><br/>('+m.operated_by+')<br/>' +
            format_addr(m)+
            'Denná kapacita: <b>'+m.daily_capacity+'</b><br/><br/>'+
            'Otváracie hodiny:<br/>'+
            '<span style="color:#828282;display:inline-block;width:50px;">PO</span> <span>' + m.service_MO + '</span><br>' +
            '<span style="color:#828282;display:inline-block;width:50px;">UT</span> <span>' + m.service_TU + '</span><br>' +
            '<span style="color:#828282;display:inline-block;width:50px;">ST</span> <span>' + m.service_WE + '</span><br>' +
            '<span style="color:#828282;display:inline-block;width:50px;">Ĺ T</span> <span>' + m.service_TH + '</span><br>' +
            '<span style="color:#828282;display:inline-block;width:50px;">PI</span> <span>' + m.service_FR + '</span><br>' +
            '<span style="color:#828282;display:inline-block;width:50px;">SO</span> <span>' + m.service_SA + '</span><br>' +
            '<span style="color:#828282;display:inline-block;width:50px;">NE</span> <span>' + m.service_SU + '</span>', { direction: 'top', permanent: false });
    }
}

function renderMap(markers) {
    var map = L.map('driveinmapid', {
        zoomControl: false,
        drawControl: true,
        attributionControl: false
    });

    var osm = new L.TileLayer.BoundaryCanvas(
//'https://api.maptiler.com/maps/basic/256/{z}/{x}/{y}@2x.png?key=GobHRsEowjmKvvSsFjDG',
        'https://maps.wikimedia.org/osm-intl/{z}/{x}/{y}.png',
        {
            attribution: '',
            maxZoom: 17,
            tileSize: 256,
            boundary: slovakiaGetJson
        });

    map.addLayer(osm);
    L.svg().addTo(map);
    //    var skLayer = L.geoJSON(geoJSON);
    //  map.fitBounds(skLayer.getBounds());
    map.fitBounds([
        [47.7584288601, 16.8799829444],
        [49.5715740017, 22.5581376482]
    ]);

    var biggest = 0;
    for (var i = 0; i < markers.length; i++) {
        var m = markers[i];
        var a = parseInt(m.daily_capacity);
        biggest = a > biggest ? a : biggest;
    }

    var svg = d3.select("#mapid").select("svg");
    var scaleFactor = 0.25;


    addCircles(svg, map, markers, "info", scaleFactor);
    addTooltips(markers, map, scaleFactor);

    map.on("moveend", function() {
        svg.selectAll("circle")
            .attr("cx", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).x })
            .attr("cy", function(d){ return map.latLngToLayerPoint([d.lat, d.long]).y })
    });

    map.addControl( L.control.zoom({position: 'topright'}) );
}
d3.json(api_v1_url+"svk-covid-driveins", function(data) {
    renderMap(data.map);
});