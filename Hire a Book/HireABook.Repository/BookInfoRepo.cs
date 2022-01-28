using HireABook.Entity;
using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace HireABook.Repository
{
    public class BookInfoRepo
    {
        private DataContext DataContextOb = DataContext.getInstance();
        public int InsertBookInfo(BookInfo bookInfoOb)
        {
            DataContextOb.Set<BookInfo>().Add(bookInfoOb);
            return DataContextOb.SaveChanges();
        }
        public List<BookInfo> GetAllById(int Id)
        {
            List<BookInfo> bookInfoList = DataContextOb.BookInfo.Where(x => x.UserId == Id).ToList();
            return bookInfoList;
        }
        public List<BookInfo> GetAll()
        {
            List<BookInfo> bookInfoList = DataContextOb.BookInfo.ToList();
            return bookInfoList;
        }
        public BookInfo GetAllByBookId(int Id)
        {
            BookInfo bookInfoList = DataContextOb.BookInfo.Where(x => x.BookId == Id).FirstOrDefault();
            return bookInfoList;
        }

        public int UpdateBookInfo(BookInfo bookInfo)
        {
            DataContextOb.Entry<BookInfo>(bookInfo).State = EntityState.Modified;
            return DataContextOb.SaveChanges();
        }
    }
}
