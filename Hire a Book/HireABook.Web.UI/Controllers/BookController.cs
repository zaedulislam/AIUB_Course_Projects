using HireABook.Entity;
using HireABook.Repository;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace HireABook.Web.UI.Controllers
{
    public class BookController : Controller
    {
        BookInfoRepo bookInfoRepoOb = new BookInfoRepo();
        BorrowInfoRepo borrowInfoRepoOb = new BorrowInfoRepo();
        // GET: Book
        public ActionResult Index()
        {
            return View();
        }

        public ActionResult BorrowBook(int id)
        {
            if (Session["userName"] != null)
            {
                BookInfo bookInfo = bookInfoRepoOb.GetAllByBookId(id);
                BorrowInfo borrowInfo = new BorrowInfo();
                borrowInfo.BookId = bookInfo.BookId;
                borrowInfo.BorrowDate = DateTime.Now;
                borrowInfo.BorrowedBy = Session["userName"].ToString();
                borrowInfo.IsReturned = false;
                borrowInfo.ReturnDate = DateTime.Now;
                borrowInfoRepoOb.InsertBorrowInfo(borrowInfo);
                return Json("Borrowed");
            }
            return Redirect("/Home/Register");
        }
    }
}