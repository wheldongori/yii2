/**
 * Created by Mark on 12/9/2020.
 */
$(function () {
  "use strict";
  $("#videoFile").change((ev) => {
    $(ev.target).closest("form").trigger("submit");
  });
});
