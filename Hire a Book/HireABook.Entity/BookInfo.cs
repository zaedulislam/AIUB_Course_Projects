using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace HireABook.Entity
{
    public class BookInfo
    {
        [Key]
        [Required]
        public int BookId { get; set; }
        [Required]
        public string BookTitle { get; set; }
        [Required]
        public string AuthorName { get; set; }
        [Required]
        public string ISBN { get; set; }
        [Required]
        public string Edition { get; set; }
        [Required]
        public double OriginalPrice { get; set; }
        public double BorrowPrice { get; set; }
        public int GenreId { get; set; }
        public string FrontCover { get; set; }
        public int SearchCount { get; set; }
        public string AddedBy { get; set; }
        public bool IsApproved { get; set; }
        public bool IsAvailable { get; set; }
        public DateTime UploadDate { get; set; }
        public int UserId { get; set; }
        [NotMapped]
        public string GenreName { get; set; }
        [NotMapped]
        public string UserName { get; set; }

    }
}
