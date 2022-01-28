using HireABook.Entity;
using HireABook.Repository;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace HireABook.Web.UI.Controllers
{
    public class SearchController : Controller
    {
        BookInfoRepo bookInfoRepoOb = new BookInfoRepo();
        GenreInfoRepo GenreInfoRepoOb = new GenreInfoRepo();
        // GET: Search
        [HttpGet]
        public ActionResult SearchResult(string searchText)
        {
            List<BookInfo> bookInfoList = bookInfoRepoOb.GetAll();

            foreach (var item in bookInfoList)
            {
                item.GenreName = GenreInfoRepoOb.GetById(item.GenreId).GenreName;
            }

            bookInfoList = bookInfoList.Where(x => x.BookTitle.Contains(searchText) || x.AuthorName.Contains(searchText)).ToList();



            return View(bookInfoList);
        }
    }
}