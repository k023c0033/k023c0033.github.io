const telInput = document.getElementById("tel");

telInput.addEventListener("input", function () {
  let cleaned = this.value.replace(/\D/g, ""); // 数字以外を除去
  if (cleaned.length > 3 && cleaned.length <= 7) {
    this.value = `${cleaned.slice(0, 3)}-${cleaned.slice(3)}`;
  } else if (cleaned.length > 7) {
    this.value = `${cleaned.slice(0, 3)}-${cleaned.slice(3, 7)}-${cleaned.slice(7, 11)}`;
  } else {
    this.value = cleaned;
  }
});
