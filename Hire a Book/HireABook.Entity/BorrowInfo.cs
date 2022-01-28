using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace HireABook.Entity
{
    public class BorrowInfo
    {
        [Key]
        [Required]
        public int BorrowId { get; set; }
        [Required]
        public string BorrowedBy { get; set; }
        public bool IsAccepted { get; set; }
        public bool IsReturned { get; set; }
        public DateTime? BorrowDate { get; set; }
        public DateTime? ReturnDate { get; set; }
        public int BookId { get; set; }

    }
}
