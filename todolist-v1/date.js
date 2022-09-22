exports.getDate = function() {
    const today = new Date();

    const options = {
      weekday: "long",
      day: "numeric",
      month: "long",
    };
  
    // we use our options object to render our date
  
    return today.toLocaleDateString("en-US", options);
};

exports.getDay = function() {
    const today = new Date();

    const options = {
      weekday: "long",
    };
  
    // we use our options object to render our date
  
    return today.toLocaleDateString("en-US", options);
};