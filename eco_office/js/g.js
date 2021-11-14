

var opts = { // options here
	angle: 0.35, // The span of the gauge arc
	lineWidth: 0.1, // The line thickness
	radiusScale: 1, // Relative radius
	pointer: {
		length: 0.6, // // Relative to gauge radius
		strokeWidth: 0.035, // The thickness
		color: '#000000', // Fill color
	},
	limitMax: false,     // If false, max value increases automatically if value > maxValue
	limitMin: false,     // If true, the min value of the gauge will be fixed
	colorStart: '#6F6EA0',   // Colors
	colorStop: '#C0C0DB',    // just experiment with them
	strokeColor: '#EEEEEE',  // to see which ones work best for you
	generateGradient: true,
	highDpiSupport: true,     // High resolution support
  
};
