$(document).ready(() => {
  
    const $showData = $('#show-data');
    const $raw = $('pre');
  
    $('#get-data').on('click', (event) => {
      //  jangan refresh halaman    
      event.preventDefault(); 
  
      $showData.text('Loading the JSON file.');
  
      $.getJSON('https://api.alquran.cloud/v1/surah', (respon) => {
        console.log(respon.code);
        console.log(respon.status);
        const markup = respon.data
          .map(item => `<li>${item.number}: ${item.name}</li>`)
          .join('');
  
        const list = $('<ul />').html(markup);
  
        $showData.html(list);
  
        $raw.text(JSON.stringify(data, undefined, 2));
      });
    });
    
  });


  // Script dari OpenAI

  fetch('https://api.example.com/data')
  .then(response => response.json())
  .then(data => {
    // Menyiapkan elemen tabel
    const table = document.createElement('table');
    const tableBody = document.createElement('tbody');

    // Menyiapkan baris dan sel untuk setiap item data
    data.forEach(item => {
      const row = document.createElement('tr');
      const col1 = document.createElement('td');
      const col2 = document.createElement('td');

      // Menetapkan nilai untuk masing-masing sel
      col1.textContent = item.col1;
      col2.textContent = item.col2;

      // Menambahkan sel ke baris
      row.appendChild(col1);
      row.appendChild(col2);

      // Menambahkan baris ke tubuh tabel
      tableBody.appendChild(row);
    });

    // Menambahkan tubuh tabel ke elemen tabel
    table.appendChild(tableBody);

    // Menambahkan tabel ke dokumen
    document.body.appendChild(table);
  });
